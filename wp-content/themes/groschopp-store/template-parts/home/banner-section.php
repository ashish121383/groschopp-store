<?php 
$banner_img_url = get_field('banner_image');
$banner_content = get_field('banner_content');
$banner_inner_content = get_field('banner_inner_content');
?>
<section class="banner">
  <div class="row">
      <div class="banner-content">
            <p> <?php echo $banner_content; ?> </p>
            <span> Illum rem sunt maiores. </span>
            <div class="inner-box">
                <p> <?php echo $banner_inner_content; ?></p>
                <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M11.3819 18.4071H11.3819C11.0678 18.4052 10.7577 18.3369 10.4719 18.2066V18.2066C9.84044 17.9276 9.42991 17.3044 9.42188 16.6127V8.17183L9.42188 8.17184C9.42991 7.48012 9.84043 6.85692 10.4719 6.57791V6.57791C11.1977 6.23422 12.0554 6.33539 12.6819 6.83855L17.7819 11.059V11.059C18.5164 11.6452 18.6378 12.7173 18.053 13.4537C17.9732 13.5543 17.8822 13.6455 17.7819 13.7255L12.6819 17.946V17.946C12.3142 18.2448 11.8552 18.4077 11.3819 18.4071L11.3819 18.4071Z" fill="#002746"/>
                </svg>

            </div>
      </div>
  </div>    
</section>