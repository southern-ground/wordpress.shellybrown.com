<div class="testimonials-left">
<div class="testimonials-body">
    <div class="testimonials-quote"><?php the_content() ?></div>
    <div class="testimonials-profile">
        <div class="testimonials-avatar">
             <div class="radius-x"><?php the_post_thumbnail('widget', '', 'class="radius-x"');?></div>
        </div> 
        <h4 class="name"> <?php the_title(); ?></h4>
        <div class="job"><?php the_excerpt(); ?></div>
    </div>                    
</div>
</div>