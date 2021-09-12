<?php 
     $pageHeading = get_field('page_heading'); 
     $pageSubheading = get_field('page_subheading'); 
     $pageDescription = get_field('page_description'); 
     $pageLink = get_field('page_link'); 
     $pageImage = get_field('page_image'); 
     $pageExtraInfoHeading = get_field('page_extra_info_heading'); 
     $pageExtraInfoDescription = get_field('page_extra_info_description'); 
?>

<section class="About-grp">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="about-content">
                   <span><?php echo $pageSubheading; ?> </span>
                   <h2> <?php echo $pageHeading; ?> </h2>
                   <p><?php echo $pageDescription; ?> </p>
                   <a href="<?php echo $pageLink; ?>" class="btn btn-lg"> 
                      Lern More 
                   </a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about-img">
                   <img src="<?php echo $pageImage; ?>" alt="" class="img-responsive" />

                   <div class="">
                      <h3><?php echo $pageExtraInfoHeading; ?></h3>
                      <p> <?php echo $pageExtraInfoDescription; ?></p>
                   </div>
                </div>
            </div>
        </div>
    </div>
</section>