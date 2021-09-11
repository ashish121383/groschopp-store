<?php get_header(); ?>

    <div class="row">
        <div class="col-sm-12 col-md-9 pull-right content">
            <?php while(have_posts()): the_post() ?>
            <?php the_content() ?>
            <?php endwhile ?>

            <?php unset($_SERVER['QUERY_STRING']); ?>
            <?php /*
            <form method="post" action="<?php echo get_permalink() ?>">
                <ul>
                    <li>
                        <label>Performance Values</label>
                        <ul>
                            <?php

                            if(!$_POST) {
                                $checked = "checked";
                            } elseif(isset($_POST['performance']) && $_POST['performance'] == 0) {
                                $checked = "checked";
                            } else {
                                $checked = "";
                            }

                            ?>
                            <li><input type="radio" name="performance" class="performance" value="0" <?php echo $checked ?> />&nbsp; Speed &amp; Torque</li>
                            <li><input type="radio" name="performance" class="performance" value="1" <?php echo (isset($_POST['performance']) && $_POST['performance'] == 1)? "checked" : "" ; ?> />&nbsp; Speed &amp; Power</li>
                            <li><input type="radio" name="performance" class="performance" value="2" <?php echo (isset($_POST['performance']) && $_POST['performance'] == 2)? "checked" : "" ; ?> />&nbsp; Torque &amp; Power</li>
                        </ul>
                    </li>
                    <input type="hidden" name="mm_stp_opt" value="stp" />

                    <?php

                    if(isset($_POST['performance']) && $_POST['performance'] == 1) {
                        $disabled = "torque";
                    } elseif(isset($_POST['performance']) && $_POST['performance'] == 2) {
                        $disabled = "speed";
                    } else {
                        $disabled = "power";
                    }

                    ?>

                    <li class="alt">
                        <label>Speed</label>
                        <input type="text" name="speed" class="performance_stp" id="speed_stp" value="<?php echo (isset($products['data']['ispeed']))? $products['data']['ispeed'] : "" ; ?>" <?php echo ($disabled == "speed")? "disabled" : ""; ?> /> rpm
                        <div class="tooltip"><div class="icon">?</div><div class="tip" id="tip-speed">Number of full shaft revolutions per minute.</div></div>
                    </li>
                    <li>
                        <label>Torque</label>
                        <input type="text" name="torque" class="performance_stp" id="torque_stp" value="<?php echo (isset($products['data']['itorque']))? $products['data']['itorque'] : "" ; ?>" <?php echo ($disabled == "torque")? "disabled" : ""; ?> />
                        <select name="torque_type" class="performance_stp" id="torque_type">
                            <option value="1" <?php echo (isset($_POST['torque_type']) && $_POST['torque_type'] == "1")? "selected" : "" ; ?>>lb-in</option>
                            <option value="2" <?php echo (isset($_POST['torque_type']) && $_POST['torque_type'] == "2")? "selected" : "" ; ?>>lb-ft</option>
                            <option value="0" <?php echo (isset($_POST['torque_type']) && $_POST['torque_type'] == "0")? "selected" : "" ; ?>>oz-in</option>
                            <option value="3" <?php echo (isset($_POST['torque_type']) && $_POST['torque_type'] == "3")? "selected" : "" ; ?>>g-cm</option>
                            <option value="4" <?php echo (isset($_POST['torque_type']) && $_POST['torque_type'] == "4")? "selected" : "" ; ?>>kg-cm</option>
                            <option value="5" <?php echo (isset($_POST['torque_type']) && $_POST['torque_type'] == "5")? "selected" : "" ; ?>>dyn-cm</option>
                            <option value="6" <?php echo (isset($_POST['torque_type']) && $_POST['torque_type'] == "6")? "selected" : "" ; ?>>mN-m</option>
                            <option value="7" <?php echo (isset($_POST['torque_type']) && $_POST['torque_type'] == "7")? "selected" : "" ; ?>>N-cm</option>
                            <option value="8" <?php echo (isset($_POST['torque_type']) && $_POST['torque_type'] == "8")? "selected" : "" ; ?>>N-m</option>
                        </select>
                        <div class="tooltip"><div class="icon">?</div><div class="tip" id="tip-torque">The amount of force necessary to rotate an object around an axis.</div></div>
                    </li>
                    <li class="alt">
                        <label>Power</label>
                        <input type="text" name="power" class="performance_stp" id="power_stp" value="<?php echo (isset($products['data']['ipower']))? $products['data']['ipower'] : "" ; ?>" <?php echo ($disabled == "power")? "disabled" : ""; ?> />
                        <select name="power_type" class="performance_stp" id="power_type">
                            <option value="2" <?php echo (isset($_POST['power_type']) && $_POST['power_type'] == 2)? "selected" : "" ; ?>>hp</option>
                            <option value="0" <?php echo (isset($_POST['power_type']) && $_POST['power_type'] == 0)? "selected" : "" ; ?>>w</option>
                            <option value="1" <?php echo (isset($_POST['power_type']) && $_POST['power_type'] == 1)? "selected" : "" ; ?>>kw</option>
                        </select>
                        <div class="tooltip"><div class="icon">?</div><div class="tip" id="tip-power">The rate at which work is being done, related to force, distance and time.</div></div>
                    </li>
                    <li>
                        <label>&nbsp;</label>
                        <input type="submit" class="text-btn" value="Calculate" />
                    </li>
                </ul>
            </form>
            */ ?>

            <?php if (isset($products['data'])) : ?>
                <?php
                    $queryStr = "?";
                    $queryStr .= 'speed=';
                    $queryStr .= $products['data']['ispeed'] ?: $_POST['speed'];
                    $queryStr .= '&torque=';
                    $queryStr .= $products['data']['itorque'] ?: $_POST['torque'];
                    $queryStr .= '&torque_type=' . $_POST['torque_type'];
                    $queryStr .= '&power=';
                    $queryStr .= $products['data']['ipower'] ?: $_POST['power'];
                    $queryStr .= '&power_type=' . $_POST['power_type'];
                    $queryStr .= '&performance=';
                    $queryStr .= $_POST['performance'] ?: 0;
                    $queryStr .= '&gearbox=All';
                    $queryStr .= '&voltage=All';
                    $queryStr .= '&phase=All';
                    $queryStr .= '&motor_type=All'

              ?>
            <div class="find-product">Got your specs? Now <a href="<?php echo get_permalink($id) . $queryStr; ?>">find a product</a> ></div>
            <?php endif ?>
        </div>
        
        <?php get_sidebar(); ?>
    </div>
<?php get_footer() ?>