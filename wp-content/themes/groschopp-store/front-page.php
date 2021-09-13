<?php get_header('new');?>

<!-- This is for banner section -->
<?php get_template_part('template-parts/home/banner-section'); ?>
<!-- This is for banner end-->


<!-- This is for front page product section -->
<?php get_template_part('template-parts/home/front-product'); ?>
<!-- End -->

<section class="burger commen-banner searchtool-grp" style="background-image:url('<?php echo get_template_directory_uri() ?>/images/yellow-bg.png')">
   <div class="container">
      <div class="row">
          <div class="col-lg-12">
              <div class="search-grp-item">
                  <h3> Motor Search Tool </h3>
                  <p class="mb-0"> Quickly search by motor and gearbox <br/> types, voltage, speed, torque and power. </p>
                  <svg width="38" height="38" viewBox="0 0 38 38" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M31.5593 18.9998L20.0393 4.67976L20.0393 4.67975L20.0328 4.67181C19.1016 3.53083 19.2717 1.85097 20.4127 0.919759L20.4237 0.910878C21.5718 -0.011474 23.2503 0.17159 24.1727 1.31976L37.0527 17.3198C37.8615 18.3038 37.8615 19.7224 37.0527 20.7064L23.7193 36.7064L23.7151 36.7116C22.7723 37.843 21.0908 37.9959 19.9593 37.0531C19.3499 36.5455 18.9981 35.7929 18.9993 34.9998C19.0043 34.3859 19.2209 33.7925 19.6127 33.3198L31.5593 18.9998ZM18.386 17.3198C19.1948 18.3038 19.1948 19.7224 18.386 20.7064L5.05266 36.7064L5.0484 36.7116C4.1056 37.843 2.4241 37.9959 1.29267 37.0531C0.683226 36.5455 0.331377 35.7929 0.332667 34.9998C0.33763 34.3859 0.554263 33.7925 0.945998 33.3198L12.8927 18.9998L1.346 4.67977L1.33712 4.66877C0.414768 3.5206 0.597832 1.84211 1.746 0.919759L1.75699 0.910878C2.90517 -0.0114739 4.58366 0.17159 5.50601 1.31976L18.386 17.3198Z" fill="white"/>
                  </svg>

              </div>
          </div>
      </div>
   </div>
</section>

<section class="eng-group">
   <div class="container">
       <div class="row">
        <?php 
             $department_name  = get_field('department_name'); 
             $department_content = get_field('department_content'); 
             $department_main_img = get_field('department_main_img'); 
             $department_inner_img = get_field('department_inner_img'); 
             $page_link = get_field('department_page_link'); 
        
        ?>
           <div class="col-lg-6 pr-5">
               <h3> <?php echo $department_name; ?> </h3>
               <p> <?php echo $department_content; ?>
                </p>
               <a href="<?php echo $page_link; ?>" class="btn btn-lg"> 
                   <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M6.47572 5.19504C6.92031 4.8471 7.56278 4.92545 7.91072 5.37004L12.6807 11.37C12.984 11.739 12.984 12.271 12.6807 12.64L7.68072 18.64C7.49036 18.8686 7.20815 19.0005 6.91072 19C6.67707 19.0005 6.45063 18.9191 6.27072 18.77L6.2688 18.7684C5.84451 18.4149 5.78717 17.7843 6.14072 17.36L10.6207 12L6.30072 6.63004C5.95278 6.18545 6.03113 5.54298 6.47572 5.19504ZM14.9107 5.37004L19.6907 11.37C19.9911 11.7414 19.987 12.2734 19.6807 12.64L14.6807 18.64C14.4904 18.8686 14.2081 19.0005 13.9107 19C13.6783 19.0033 13.452 18.9255 13.2707 18.78L13.2688 18.7784C12.8445 18.4249 12.7872 17.7943 13.1407 17.37L17.6207 12L13.3507 6.63005L13.3474 6.62592C13.0015 6.19536 13.0702 5.56592 13.5007 5.22004L13.5048 5.21671C13.9354 4.87083 14.5648 4.93948 14.9107 5.37004Z" fill="white"/>
                    </svg> &nbsp;
                    <span> Lern More </span> </a>
           </div>
           <div class="col-lg-6">
               <img src="<?php echo $department_main_img; ?>" alt="" class="img-responsive"/>
               <div class="eng-img">
                   <img src="<?php echo $department_inner_img;  ?>" alt=""/>
               </div>
           </div>
       </div>
   </div>    
</section>

<section class="slider-grp burger">
   <div class="container">
       <div class="row">
           <div class="col-lg-2"></div>
           <div class="col-lg-8">
              <div class="home-slider" id="home-slider">
                 <div class="slider_item">
                     <p> DID YOU KNOW </p>
                     <h4> Universal Motors have high power-to weight ratios, potentially reachng speeds of 20,000rpm+ </h4>
                 </div>
                 <div class="slider_item">
                     <p> DID YOU KNOW </p>
                     <h4> Universal Motors have high power-to weight ratios, potentially reachng speeds of 20,000rpm+ </h4>
                 </div>
                 <div class="slider_item">
                     <p> DID YOU KNOW </p>
                     <h4> Universal Motors have high power-to weight ratios, potentially reachng speeds of 20,000rpm+ </h4>
                 </div>
              </div>
           </div>
           <div class="col-lg-2"></div>
       </div>
   </div>    
</section>

<section class="edu-center-grp burger">
   <div class="container">
        <h3> EDUCATION CENTER </h3>
       <div class="row">
            <?php 
                $args = array(
                    'post_type' => 'post',
                    'posts_per_page' => 6,

                ); 
                $query = new WP_Query( $args );
                while($query->have_posts()): $query->the_post(); 
            ?>
           <div class="col-lg-4">
               <div class="edu-center-item">
                   <img src="<?php echo get_template_directory_uri(); ?>/images/TI.png" alt=""/>
                   <div>
                        <svg width="20" height="25" viewBox="0 0 20 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M12.0789 20.2568H11.9126V20.2568C11.225 20.1706 10.661 19.5311 10.5193 18.6768L8.39763 6.25683L6.21263 12.6568V12.6568C6.08631 13.0224 5.80008 13.2582 5.48429 13.2568H3.10929V13.2568C2.67207 13.2568 2.31763 12.8091 2.31763 12.2568C2.31763 11.7045 2.67207 11.2568 3.10929 11.2568H4.96179L6.94888 5.46683V5.46683C7.2976 4.4539 8.23037 3.98984 9.03228 4.43034C9.50105 4.68784 9.84256 5.21537 9.94929 5.84683L12.071 18.2568L14.256 11.8768V11.8768C14.3774 11.5034 14.6647 11.2588 14.9843 11.2568H17.3593V11.2568C17.7965 11.2568 18.151 11.7045 18.151 12.2568C18.151 12.8091 17.7965 13.2568 17.3593 13.2568H15.5068L13.5197 19.0468V19.0468C13.2718 19.7753 12.7066 20.2499 12.0789 20.2568V20.2568Z" fill="#002746"/>
                        </svg>
                        <h4> <?php echo get_the_title();  ?> </h4>
                        <p> <?php echo get_the_excerpt(); ?>
                        </p>
                   </div>
               </div>
           </div>
                <?php endwhile; 
                    wp_reset_postdata();
                ?>
       </div>

       <!-- <div class="row mt-2">
           <div class="col-lg-4">
               <div class="edu-center-item">
                   <img src="<?php echo get_template_directory_uri() ?>/images/TI.png" alt=""/>
                   <div>
                        <svg width="20" height="25" viewBox="0 0 20 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M12.0789 20.2568H11.9126V20.2568C11.225 20.1706 10.661 19.5311 10.5193 18.6768L8.39763 6.25683L6.21263 12.6568V12.6568C6.08631 13.0224 5.80008 13.2582 5.48429 13.2568H3.10929V13.2568C2.67207 13.2568 2.31763 12.8091 2.31763 12.2568C2.31763 11.7045 2.67207 11.2568 3.10929 11.2568H4.96179L6.94888 5.46683V5.46683C7.2976 4.4539 8.23037 3.98984 9.03228 4.43034C9.50105 4.68784 9.84256 5.21537 9.94929 5.84683L12.071 18.2568L14.256 11.8768V11.8768C14.3774 11.5034 14.6647 11.2588 14.9843 11.2568H17.3593V11.2568C17.7965 11.2568 18.151 11.7045 18.151 12.2568C18.151 12.8091 17.7965 13.2568 17.3593 13.2568H15.5068L13.5197 19.0468V19.0468C13.2718 19.7753 12.7066 20.2499 12.0789 20.2568V20.2568Z" fill="#002746"/>
                        </svg>
                        <h4> Title </h4>
                        <p> Sit officia facere ut quo ullam vitae rerum vel soluta. Et ex ut. 
                             Porro sunt rerum eveniet laudantium accusantium. Exercitationem qui sunt.
                        </p>
                   </div>
               </div>
           </div>

           <div class="col-lg-4">
              <div class="edu-center-item">
                   <img src="<?php echo get_template_directory_uri() ?>/images/TI.png" alt=""/>
                   <div>
                        <svg width="20" height="25" viewBox="0 0 20 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M12.0789 20.2568H11.9126V20.2568C11.225 20.1706 10.661 19.5311 10.5193 18.6768L8.39763 6.25683L6.21263 12.6568V12.6568C6.08631 13.0224 5.80008 13.2582 5.48429 13.2568H3.10929V13.2568C2.67207 13.2568 2.31763 12.8091 2.31763 12.2568C2.31763 11.7045 2.67207 11.2568 3.10929 11.2568H4.96179L6.94888 5.46683V5.46683C7.2976 4.4539 8.23037 3.98984 9.03228 4.43034C9.50105 4.68784 9.84256 5.21537 9.94929 5.84683L12.071 18.2568L14.256 11.8768V11.8768C14.3774 11.5034 14.6647 11.2588 14.9843 11.2568H17.3593V11.2568C17.7965 11.2568 18.151 11.7045 18.151 12.2568C18.151 12.8091 17.7965 13.2568 17.3593 13.2568H15.5068L13.5197 19.0468V19.0468C13.2718 19.7753 12.7066 20.2499 12.0789 20.2568V20.2568Z" fill="#002746"/>
                        </svg>
                        <h4> Title </h4>
                        <p> Sit officia facere ut quo ullam vitae rerum vel soluta. Et ex ut. 
                             Porro sunt rerum eveniet laudantium accusantium. Exercitationem qui sunt.
                        </p>
                   </div>
               </div>
           </div>
           
           <div class="col-lg-4">
               <div class="edu-center-item">
                   <img src="<?php echo get_template_directory_uri() ?>/images/TI.png" alt=""/>
                   <div>
                        <svg width="20" height="25" viewBox="0 0 20 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M12.0789 20.2568H11.9126V20.2568C11.225 20.1706 10.661 19.5311 10.5193 18.6768L8.39763 6.25683L6.21263 12.6568V12.6568C6.08631 13.0224 5.80008 13.2582 5.48429 13.2568H3.10929V13.2568C2.67207 13.2568 2.31763 12.8091 2.31763 12.2568C2.31763 11.7045 2.67207 11.2568 3.10929 11.2568H4.96179L6.94888 5.46683V5.46683C7.2976 4.4539 8.23037 3.98984 9.03228 4.43034C9.50105 4.68784 9.84256 5.21537 9.94929 5.84683L12.071 18.2568L14.256 11.8768V11.8768C14.3774 11.5034 14.6647 11.2588 14.9843 11.2568H17.3593V11.2568C17.7965 11.2568 18.151 11.7045 18.151 12.2568C18.151 12.8091 17.7965 13.2568 17.3593 13.2568H15.5068L13.5197 19.0468V19.0468C13.2718 19.7753 12.7066 20.2499 12.0789 20.2568V20.2568Z" fill="#002746"/>
                        </svg>
                        <h4> Title </h4>
                        <p> Sit officia facere ut quo ullam vitae rerum vel soluta. Et ex ut. 
                             Porro sunt rerum eveniet laudantium accusantium. Exercitationem qui sunt.
                        </p>
                   </div>
               </div>
           </div>
       </div> -->
       <div class="text-right mt-2">
         <a href="<?php echo home_url(); ?>"> ALL ARTICLES &nbsp; <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" clip-rule="evenodd" d="M5.73865 13H17.5986L13.9686 17.36V17.36C13.6152 17.7853 13.6734 18.4165 14.0986 18.77C14.5239 19.1235 15.1552 19.0653 15.5086 18.64L20.5086 12.64V12.64C20.5423 12.5923 20.5724 12.5421 20.5986 12.49C20.5986 12.44 20.6486 12.41 20.6686 12.36V12.36C20.714 12.2453 20.7377 12.1233 20.7386 12V12C20.7377 11.8767 20.714 11.7547 20.6686 11.64C20.6686 11.59 20.6186 11.56 20.5986 11.51V11.51C20.5724 11.4579 20.5423 11.4077 20.5086 11.36L15.5086 5.36V5.36C15.3183 5.13146 15.0361 4.99952 14.7386 5V5C14.505 4.99955 14.2786 5.08092 14.0986 5.23L14.0986 5.23C13.6735 5.58249 13.6146 6.21291 13.967 6.63808C13.9676 6.63872 13.9681 6.63936 13.9686 6.64L17.5986 11H5.73865V11C5.18636 11 4.73865 11.4477 4.73865 12C4.73865 12.5523 5.18636 13 5.73865 13L5.73865 13Z" fill="#002746"/>
        </svg>
        </a>
       </div>
   </div>    
</section>
<!-- This is for front page product section -->
<?php get_template_part('template-parts/home/aboutus'); ?>
<!-- End -->




<?php get_footer('new');?>