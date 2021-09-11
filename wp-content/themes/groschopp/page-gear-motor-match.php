<?php $debug = false; ?>
<?php get_header(); ?>

<?php //This allows someone to link directly to the stp option ?>
<?php if ($_GET['toggle'] == 'stp') $_POST['mm_stp_opt'] = 'stp'; ?>

<!-- main -->
<div id="main">
    <!-- content -->
    <div id="content">

        <div id="sm-icons">
            Share with a friend: <span class='st_facebook' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>' ></span><span class='st_twitter' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>' ></span><span class='st_email' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>' ></span><span class='st_sharethis' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>' ></span><span class='st_plusone' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>' ></span>
        </div>

        <div class="motor-match">
            <?php /*
            <p>
                Motor Match™ is a web-based search tool that simplifies fractional horsepower motor and gearmotor selection for engineers and product designers. Enter your specifications below and receive the top “best fit” motors and gearmotors for your specs, or just use the calculator function to determine speed, torque and horsepower specifications.
            </p>
            */ ?>
           
            <?php the_content() ?>

            <?php if ($_POST['mm_stp_opt'] !== 'stp') : ?>
                <p>
                    Results are based on continuous duty, full load motor rating. For applications with on-cycle of less than 10 min. please contact Groschopp.
                </p>
            <?php endif ?>
        </div>
        <form name="mm-stp" id="mm-stp" action="<?php $id = get_the_ID(); echo get_permalink($id) ?>" method="post">
            <input type="radio" name="mm_stp_opt" id="mm-stp-opt-stp" value="stp" <?php echo $_POST['mm_stp_opt'] === 'stp' ? 'checked' : ''?>>&emsp;Speed, Torque and Power Calculator<br />
            <input type="radio" name="mm_stp_opt" id="mm-stp-opt-mm" value="mm" <?php echo $_POST['mm_stp_opt'] !== 'stp' ? 'checked' : ''?>>&emsp;GearMotorMatch&trade;<br />
        </form>

        <p>&nbsp;</p>
        <?php $_POST['mm_stp_opt'] !== 'stp' ? get_template_part('part-motor-match') : get_template_part('part-stp-calculator');  ?>

    </div>



    <!-- sidebar -->
    <?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>
