<p><img src="/images/shim_square.gif" alt="" width="16" height="16" />Contact me </p>
<p><img src="/images/shim_square.gif" alt="" width="16" height="16" />07815 797 645</p>

<?php
if(!isset($hide_student_testimonials)):
?>
<p style="padding-left:20px">
    <strong>Student testimonials</strong><br />
    <em style="font-size:0.8em;">{{$review->testimonial_text}}</em><br />
    <strong>{{$review->person_name}}</strong><br />
    <a href="testimonials_reviews" style="text-decoration:none">... more </a>
</p>
<?php endif; ?>

<?php if(isset($show_right_portrait)): ?>
<p><img src="/images/greenline.jpg" alt="" width="176" height="10" class="mobile_hide"/>
    <a href="aboutme.php"><img src="/images/portrait2.jpg" alt="Kevin Saunders" width="190" height="142" border="0" class="mobile_hide right_bar_break" /></a>
    <img src="/images/right_col_shim.gif" alt="" width="174" height="20" class="mobile_hide" />  </p>
<?php endif; ?>
<?php if(isset($show_facebook)) : ?>
<div class="fb-like-box" data-href="https://www.facebook.com/yogaground.london" data-colorscheme="dark" width="180" data-show-faces="true" data-header="true" data-stream="false" data-show-border="false"></div>

<?php endif; ?>

<p><img src="/images/right_plant_motif.jpg" alt="" width="191" height="59" class="mobile_hide" /></p>


<p><br />
    <img src="/images/right_collage.jpg" alt="" width="190" height="155" class="image_left right_bar_break" />
    <img src="/images/yoga_alliance_200_teacher.jpg" alt="" width="190" height="108" class="image_left right_bar_break" />
    <img src="/images/relax-and-renew-badge.jpg" alt="Relax and restore trainer" width="190" height="190" class="image_left right_bar_break" />
    <img src="/images/registered_exercise_prof.jpg" alt="" width="140" height="140" style="margin-left:25px;" class="image_left right_bar_break" />
</p>
