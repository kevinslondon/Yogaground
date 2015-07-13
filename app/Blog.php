<?php
/**
 * Created by PhpStorm.
 * User: Kevin
 * Date: 13/07/2015
 * Time: 19:25
 */

namespace app;


use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'yogablog_posts';

    public function getBlogMenu()
    {
        return $this->join('yogablog_term_relationships','yogablog_posts.ID', '=','yogablog_term_relationships.object_id')
            ->join('yogablog_term_taxonomy', 'yogablog_term_relationships.term_taxonomy_id','=','yogablog_term_taxonomy.term_taxonomy_id')
            ->join('yogablog_terms','yogablog_terms.term_id','=','yogablog_term_taxonomy.term_id')
            ->where('post_type','post')
            ->where('slug','menu')
            ->where('post_status','publish')
            ->orderBy('post_date','desc')
            ->get();
    }


}