<?php if($_GET): ?>
    <?php $products = motor_match($_GET); ?>
<?php endif; ?>
<form method="get" action="">
    <ul>
        <li>
            <label>Motor Type</label>
            <select name="motor_type" id="motor_type">
                <option>All</option>
                <option value="1" <?php echo (isset($_GET['motor_type']) && $_GET['motor_type'] == 1)? "selected" : "" ; ?>>AC Motor</option>
                <option value="23" <?php echo (isset($_GET['motor_type']) && $_GET['motor_type'] == 23)? "selected" : "" ; ?>>Brushless DC Motor</option>
                <option value="2" <?php echo (isset($_GET['motor_type']) && $_GET['motor_type'] == 2)? "selected" : "" ; ?>>DC Motor</option>
            </select>
        </li>
        <li class="alt">
            <label>Gearbox</label>
            <select name="gearbox">
                <option value="none" <?php echo (isset($_GET['gearbox']) && $_GET['gearbox'] == "none")? "selected" : "" ; ?>>No Gearbox</option>
                <option value="18" <?php echo (isset($_GET['gearbox']) && $_GET['gearbox'] == 18)? "selected" : "" ; ?> >Planetary</option>
                <option value="8" <?php echo (isset($_GET['gearbox']) && $_GET['gearbox'] == 8)? "selected" : "" ; ?>>Parallel Shaft</option>
                <option value="12" <?php echo (isset($_GET['gearbox']) && $_GET['gearbox'] == 12)? "selected" : "" ; ?>>Right Angle</option>
                <option value="11" <?php echo (isset($_GET['gearbox']) && $_GET['gearbox'] == 11)? "selected" : "" ; ?>>Right Angle Planetary</option>
                <option value="All" <?php echo (isset($_GET['gearbox']) && $_GET['gearbox'] == "All")? "selected" : "" ; ?>>All Gearboxes</option>
            </select>
        </li>
        <li>
            <label>Voltage</label>
            <select name="voltage" id="voltage">
                <option>All</option>
                <?php if($_GET['motor_type'] == 1): ?>
                    <option value="115" <?php echo (isset($_GET['voltage']) && $_GET['voltage'] == 115)? "selected" : "" ; ?>>115</option>
                    <option value="230" <?php echo (isset($_GET['voltage']) && $_GET['voltage'] == 230)? "selected" : "" ; ?>>230</option>
                <?php elseif($_GET['motor_type'] == 23): ?>
                    <option value="24" <?php echo (isset($_GET['voltage']) && $_GET['voltage'] == 24)? "selected" : "" ; ?>>24</option>
                    <option value="163" <?php echo (isset($_GET['voltage']) && $_GET['voltage'] == 163)? "selected" : "" ; ?>>163</option>
                <?php elseif($_GET['motor_type'] == 2): ?>
                    <option value="12" <?php echo (isset($_GET['voltage']) && $_GET['voltage'] == 12)? "selected" : "" ; ?>>12</option>
                    <option value="24" <?php echo (isset($_GET['voltage']) && $_GET['voltage'] == 24)? "selected" : "" ; ?>>24</option>
                    <option value="90" <?php echo (isset($_GET['voltage']) && $_GET['voltage'] == 90)? "selected" : "" ; ?>>90</option>
                    <option value="115" <?php echo (isset($_GET['voltage']) && $_GET['voltage'] == 115)? "selected" : "" ; ?>>115</option>
                    <option value="130" <?php echo (isset($_GET['voltage']) && $_GET['voltage'] == 130)? "selected" : "" ; ?>>130</option>
                    <option value="180" <?php echo (isset($_GET['voltage']) && $_GET['voltage'] == 180)? "selected" : "" ; ?>>180</option>
                <?php else: ?>
                    <option value="12" <?php echo (isset($_GET['voltage']) && $_GET['voltage'] == 12)? "selected" : "" ; ?>>12</option>
                    <option value="24" <?php echo (isset($_GET['voltage']) && $_GET['voltage'] == 24)? "selected" : "" ; ?>>24</option>
                    <option value="90" <?php echo (isset($_GET['voltage']) && $_GET['voltage'] == 90)? "selected" : "" ; ?>>90</option>
                    <option value="115" <?php echo (isset($_GET['voltage']) && $_GET['voltage'] == 115)? "selected" : "" ; ?>>115</option>
                    <option value="130" <?php echo (isset($_GET['voltage']) && $_GET['voltage'] == 130)? "selected" : "" ; ?>>130</option>
                    <option value="163" <?php echo (isset($_GET['voltage']) && $_GET['voltage'] == 163)? "selected" : "" ; ?>>163</option>
                    <option value="180" <?php echo (isset($_GET['voltage']) && $_GET['voltage'] == 180)? "selected" : "" ; ?>>180</option>
                    <option value="230" <?php echo (isset($_GET['voltage']) && $_GET['voltage'] == 230)? "selected" : "" ; ?>>230</option>
                <?php endif; ?>
            </select>
        </li>
        <li class="alt">
            <label>Phase</label>
            <select name="phase" id="phase" <?php echo ($_GET['motor_type'] == 23 || $_GET['motor_type'] == 2)? "disabled" : "" ; ?>>
                <option>All</option>
                <?php if($_GET['motor_type'] == 1 && $_GET['voltage'] == 115): ?>
                    <option value="1ph 50Hz" <?php echo (isset($_GET['phase']) && $_GET['phase'] == "1ph 50Hz")? "selected" : "" ; ?>>1ph 50Hz</option>
                    <option value="1ph 60Hz" <?php echo (isset($_GET['phase']) && $_GET['phase'] == "1ph 60Hz")? "selected" : "" ; ?>>1ph 60Hz</option>
                <?php else: ?>
                    <option value="1ph 50Hz" <?php echo (isset($_GET['phase']) && $_GET['phase'] == "1ph 50Hz")? "selected" : "" ; ?>>1ph 50Hz</option>
                    <option value="1ph 60Hz" <?php echo (isset($_GET['phase']) && $_GET['phase'] == "1ph 60Hz")? "selected" : "" ; ?>>1ph 60Hz</option>
                    <option value="3ph 50Hz" <?php echo (isset($_GET['phase']) && $_GET['phase'] == "3ph 50Hz")? "selected" : "" ; ?>>3ph 50Hz</option>
                    <option value="3ph 60Hz" <?php echo (isset($_GET['phase']) && $_GET['phase'] == "3ph 60Hz")? "selected" : "" ; ?>>3ph 60Hz</option>
                <?php endif; ?>
            </select>
        </li>
        <li>
            <label>Performance Values</label>
            <ul>
                <?php

                if(!$_GET) {
                    $checked = "checked";
                } elseif(isset($_GET['performance']) && $_GET['performance'] == 0) {
                    $checked = "checked";
                } else {
                    $checked = "";
                }

                ?>
                <li><input type="radio" name="performance" class="performance" value="0" <?php echo $checked ?> />&nbsp; Speed &amp; Torque</li>
                <li><input type="radio" name="performance" class="performance" value="1" <?php echo (isset($_GET['performance']) && $_GET['performance'] == 1)? "checked" : "" ; ?> />&nbsp; Speed &amp; Power</li>
                <li><input type="radio" name="performance" class="performance" value="2" <?php echo (isset($_GET['performance']) && $_GET['performance'] == 2)? "checked" : "" ; ?> />&nbsp; Torque &amp; Power</li>
            </ul>
        </li>

        <?php

        if(isset($_GET['performance']) && $_GET['performance'] == 1) {
            $disabled = "torque";
        } elseif(isset($_GET['performance']) && $_GET['performance'] == 2) {
            $disabled = "speed";
        } else {
            $disabled = "power";
        }

        ?>

        <li class="alt">
            <label id="speed_label">Speed <?php echo ($disabled == "speed")? "" : "( <i style='color:green;'>required</i> )" ; ?></label>
            <input type="text" name="speed" id="speed" value="<?php echo (isset($products['data']['ispeed']))? $products['data']['ispeed'] : "" ; ?>" <?php echo ($disabled == "speed")? "disabled" : ""; ?> /> rpm
            <div class="tooltip"><div class="icon">?</div><div class="tip" id="tip-speed">Number of full shaft revolutions per minute.</div></div>
        </li>
        <li>
            <label id="torque_label">Torque <?php echo ($disabled == "torque")? "" : "( <i style='color:green;'>required</i> )" ; ?></label>
            <input type="text" name="torque" id="torque" value="<?php echo (isset($products['data']['itorque']))? $products['data']['itorque'] : "" ; ?>" <?php echo ($disabled == "torque")? "disabled" : ""; ?> />
            <select name="torque_type" id="torque_type">
                <option value="1" <?php echo (isset($_GET['torque_type']) && $_GET['torque_type'] == "1")? "selected" : "" ; ?>>in-lb</option>
                <option value="2" <?php echo (isset($_GET['torque_type']) && $_GET['torque_type'] == "2")? "selected" : "" ; ?>>lb-ft</option>
                <option value="0" <?php echo (isset($_GET['torque_type']) && $_GET['torque_type'] == "0")? "selected" : "" ; ?>>oz-in</option>
                <option value="3" <?php echo (isset($_GET['torque_type']) && $_GET['torque_type'] == "3")? "selected" : "" ; ?>>g-cm</option>
                <option value="4" <?php echo (isset($_GET['torque_type']) && $_GET['torque_type'] == "4")? "selected" : "" ; ?>>kg-cm</option>
                <option value="5" <?php echo (isset($_GET['torque_type']) && $_GET['torque_type'] == "5")? "selected" : "" ; ?>>dyn-cm</option>
                <option value="6" <?php echo (isset($_GET['torque_type']) && $_GET['torque_type'] == "6")? "selected" : "" ; ?>>mN-m</option>
                <option value="7" <?php echo (isset($_GET['torque_type']) && $_GET['torque_type'] == "7")? "selected" : "" ; ?>>N-cm</option>
                <option value="8" <?php echo (isset($_GET['torque_type']) && $_GET['torque_type'] == "8")? "selected" : "" ; ?>>N-m</option>
            </select>
            <div class="tooltip"><div class="icon">?</div><div class="tip" id="tip-torque">The amount of force necessary to rotate an object around an axis.</div></div>
        </li>
        <li class="alt">
            <label id="power_label">Power <?php echo ($disabled == "power")? "" : "( <i style='color:green;'>required</i> )" ; ?></label>
            <input type="text" name="power" id="power" value="<?php echo (isset($products['data']['ipower']))? $products['data']['ipower'] : "" ; ?>" <?php echo ($disabled == "power")? "disabled" : ""; ?> />
            <select name="power_type" id="power_type">
                <option value="2" <?php echo (isset($_GET['power_type']) && $_GET['power_type'] == 2)? "selected" : "" ; ?>>hp</option>
                <option value="0" <?php echo (isset($_GET['power_type']) && $_GET['power_type'] == 0)? "selected" : "" ; ?>>w</option>
                <option value="1" <?php echo (isset($_GET['power_type']) && $_GET['power_type'] == 1)? "selected" : "" ; ?>>kw</option>
            </select>
            <div class="tooltip"><div class="icon">?</div><div class="tip" id="tip-power">The rate at which work is being done, related to force, distance and time.</div></div>
        </li>
        <li>
            <label>&nbsp;</label>
            <input type="submit" value="Search" />
            <input type="button" value="Reset Search" onClick="window.location = '/motor-match/';" />
        </li>
    </ul>
</form>

<?php if($_GET): ?>
    <div id="result-list">
        <?php if($products['results']): ?>
        <table>
            <thead>
            <tr>
                <th>Rank</th>
                <th>Product #</th>
                <th>Model #</th>
                <th>Motor Type</th>
                <th>Ratio</th>
                <th>Speed <br/>(RPM)</th>
                <th>Torque <br/>(in-lb)</th>
                <th>System Power <br/>(HP)</th>
                <th></th>
            <tr>
            </thead>
            <tbody>
            <?php $alt = false; ?>
                <?php foreach($products['results'] as $product): ?>
                    <?php $alt = ($alt)? "alt" : "" ; ?>
                    <tr>
                        <td class="<?php echo $alt ?>"><?php echo $product->rank ?></td>

                        <?php if($product->type_id == 1): ?>
                            <td class="<?php echo $alt ?>"><a href="/category/products/motors/?t=213&id=<?php echo $product->id ?>&hash=<?php echo $products['data']['search_hash'] ?>"><?php echo $product->ordering_number ?></a></td>
                        <?php endif; ?>
                        <?php if($product->type_id == 2): ?>
                            <td class="<?php echo $alt ?>"><a href="/category/products/gearmotors/?t=215&id=<?php echo $product->id ?>&hash=<?php echo $products['data']['search_hash'] ?>"><?php echo $product->ordering_number ?></a></td>
                        <?php endif; ?>
                        <?php /*
						<?php if($product->type_id == 23): ?>
						<td class="<?php echo $alt ?>"><a href="/category/products/gearmotors/?t=230&id=<?php echo $product->id ?>&hash=<?php echo $products['data']['search_hash'] ?>"><?php echo $product->ordering_number ?></a></td>
						<?php endif; ?>
						*/ ?>
                        <?php if($product->type_id == 18): ?>
                            <td class="<?php echo $alt ?>"><a href="/category/products/gearmotors/?t=947&id=<?php echo $product->id ?>&hash=<?php echo $products['data']['search_hash'] ?>"><?php echo $product->ordering_number ?></a></td>
                        <?php endif; ?>
                        <?php if($product->type_id == 8): ?>
                            <td class="<?php echo $alt ?>"><a href="/category/products/gearmotors/?t=1163&id=<?php echo $product->id ?>&hash=<?php echo $products['data']['search_hash'] ?>"><?php echo $product->ordering_number ?></a></td>
                        <?php endif; ?>
                        <?php if($product->type_id == 12): ?>
                            <td class="<?php echo $alt ?>"><a href="/category/products/gearmotors/?t=953&id=<?php echo $product->id ?>&hash=<?php echo $products['data']['search_hash'] ?>"><?php echo $product->ordering_number ?></a></td>
                        <?php endif; ?>
                        <?php if($product->type_id == 11): ?>
                            <td class="<?php echo $alt ?>"><a href="/category/products/gearmotors/?t=951&id=<?php echo $product->id ?>&hash=<?php echo $products['data']['search_hash'] ?>"><?php echo $product->ordering_number ?></a></td>
                        <?php endif; ?>
                        <?php if($product->type_id == 7): ?>
                            <td class="<?php echo $alt ?>"><a href="/category/products/gearmotors/?t=1166&id=<?php echo $product->id ?>&hash=<?php echo $products['data']['search_hash'] ?>"><?php echo $product->ordering_number ?></a></td>
                        <?php endif; ?>
                        <?php if($product->type_id == 14): ?>
                            <td class="<?php echo $alt ?>"><a href="/category/products/gearmotors/?t=1168&id=<?php echo $product->id ?>&hash=<?php echo $products['data']['search_hash'] ?>"><?php echo $product->ordering_number ?></a></td>
                        <?php endif; ?>
                        <?php if($product->type_id == 6): ?>
                            <td class="<?php echo $alt ?>"><a href="/category/products/gearmotors/?t=949&id=<?php echo $product->id ?>&hash=<?php echo $products['data']['search_hash'] ?>"><?php echo $product->ordering_number ?></a></td>
                        <?php endif; ?>
                        <?php if($product->type_id == 3): ?>
                            <td class="<?php echo $alt ?>"><a href="/category/products/gearmotors/?t=1170&id=<?php echo $product->id ?>&hash=<?php echo $products['data']['search_hash'] ?>"><?php echo $product->ordering_number ?></a></td>
                        <?php endif; ?>
                        <?php if($product->type_id == 23): ?>
                            <td class="<?php echo $alt ?>"><a href="/category/products/gearmotors/?t=244&id=<?php echo $product->id ?>&hash=<?php echo $products['data']['search_hash'] ?>"><?php echo $product->ordering_number ?></a></td>
                        <?php endif; ?>
                        <?php if($product->type_id == 24): ?>
                            <td class="<?php echo $alt ?>"><a href="/category/products/gearmotors/?t=3729&id=<?php echo $product->id ?>&hash=<?php echo $products['data']['search_hash'] ?>"><?php echo $product->ordering_number ?></a></td>
                        <?php endif; ?>
                        <?php if($product->type_id == 25): ?>
                            <td class="<?php echo $alt ?>"><a href="/category/products/gearmotors/?t=3726&id=<?php echo $product->id ?>&hash=<?php echo $products['data']['search_hash'] ?>"><?php echo $product->ordering_number ?></a></td>
                        <?php endif; ?>
                        <?php if($product->type_id == 26): ?>
                            <td class="<?php echo $alt ?>"><a href="/category/products/gearmotors/?t=3732&id=<?php echo $product->id ?>&hash=<?php echo $products['data']['search_hash'] ?>"><?php echo $product->ordering_number ?></a></td>
                        <?php endif; ?>
                        <?php if($product->type_id == 27): ?>
                            <td class="<?php echo $alt ?>"><a href="/category/products/gearmotors/?t=3735&id=<?php echo $product->id ?>&hash=<?php echo $products['data']['search_hash'] ?>"><?php echo $product->ordering_number ?></a></td>
                        <?php endif; ?>

                        <td class="<?php echo $alt ?>"><?php echo $product->model ?></td>
                        <td class="<?php echo $alt ?>"><?php echo $product->motor_type ?></td>
                        <td class="<?php echo $alt ?>"><?php echo $product->ratio ?></td>
                        <td class="<?php echo $alt ?>"><?php echo $product->output_speed ?></td>
                        <td class="<?php echo $alt ?>"><?php echo $product->torqk ?></td>
                        <td class="<?php echo $alt ?>"><?php echo $product->system_hp ?></td>
                        <td class="<?php echo $alt ?>"><a class="modal" href="<?php bloginfo('template_url'); ?>/quote-add.php?id=<?php echo $product->id ?>"><img src="<?php bloginfo('template_url'); ?>/images/btn_Add-to-Quote_sm.jpg" alt="Add to Quote button" width="91" height="23" border="0" style="margin-top:4px; margin-bottom:-2px;"/></a></td>
                    </tr>
                    <?php if($debug): ?>
                        <tr>
                            <td style="background:#CCC;" colspan="9">
                                <strong>ErrSpeed</strong> <?php echo $product->errSpeed ?><br/>
                                <strong>ErrTorque</strong> <?php echo $product->errTorque ?><br/>
                                <strong>ErrTotal</strong> <?php echo $product->errTotal ?><br/>
                                <strong>ErrTotal2</strong> <?php echo $product->errTotal2 ?><br/>
                                <strong>ErrTotalMod</strong> <?php echo $product->errTotalMod ?><br/>
                                <strong>ErrTotalMod2</strong> <?php echo $product->errTotalMod2 ?><br/>
                                <strong>ErrFitness</strong> <?php echo $product->errFitness ?><br/>
                            </td>
                        </tr>
                    <?php endif; ?>
                    <?php $alt = !$alt ?>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php else: ?>
        <div style="text-align:center;">
            <div style="margin-top:30px;">
                <h3>No Results Found</h3>
                <div class="no-results"><p>We have over 100,000 possible motor designs, but only 8,000 of them are available in this tool! If your specs aren't pulling any results or you'd like to learn about our custom motor options, please give us a call at <strong>(800) 829-4135</strong>.</p></div>
            </div>
        </div>
        <?php endif; ?>
    </div>
<?php endif; ?>
<p>&nbsp</p>
<strong><hr /></strong>
<h1 style="color:#2685c4">More GearMotorMatch&trade; Help</h1>
<p>Need more help finding a motor that matches your application? This tool represents only a portion of our available motor designs. Give us a call at 800-829-4135 to talk about all options. Visit our GearMotorMatch™ <a href="http://www.groschopp.com/about-gear-motor-match/">help page</a> for instructions about how to use this tool, or feel free to <a href="http://www.groschopp.com/contact/">contact us</a> via our online form. We're here to help!</p>
<!--<p>Visit our Motor Match <a href="--><?php //echo get_permalink(1055)?><!--">help page</a><!-- or <a href="">Glossary of Terms</a>-->