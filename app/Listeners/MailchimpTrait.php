<?php
/**
 * @author Kevin Saunders
 * Date: 18/04/2018
 */

namespace App\Listeners;


use Newsletter;

trait MailchimpTrait
{

    /**
     * Access the mailchimp lists API
     * for more info check "https://apidocs.mailchimp.com/api/2.0/lists/subscribe.php"
     *
     * @param $email
     * @param $firstname
     * @param $lastname
     */
    public function addEmailToMailchimpList($email, $firstname, $lastname)
    {
        if (!$email) {
            return;
        }

        if ($this->isBlackList($email)) {
            return;
        }


        try {
            $result = Newsletter::subscribe($email, ['FNAME' => $firstname, 'LNAME' => $lastname]);

            //echo 'subscribe: '. ($result ? 'true' : 'false');

        }  catch (\Exception $e) {
            echo $e->getMessage();
            echo $e->getTraceAsString();
        }
    }

    protected function isBlackList($email)
    {
        if (!$email) {
            return false;
        }

        $email_domain = substr(strrchr($email, "@"), 1);

        $black_list = explode(',', env('MAILCHIMP_BLACK_LIST'));

        return in_array($email_domain, $black_list);
    }

}