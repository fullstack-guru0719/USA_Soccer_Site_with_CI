<section>
    <div class=container>
        <div class=row>
            <?php if (!($standings)) { ?>
            <div class="matchSchedule_details row">
                <div class=match_next>
                    <div class="wrap_match_next right-triangle">
                        <div class=right-padding><h4 class=headline03>Standings</h4>

                            <p>Table</p></div>
                    </div>
                </div>
                <div class=match_versus-wrap>
                    <div class=wrap_match-innerdetails>
                        <ul class="point_table scrollable">
                            <li class=clearfix>
                                <div class=subPoint_table>      
                                    <div class="headline01 smallpoint">1</div>
                                    <div class="headline01 largepoint">LA Aztecs</div>
                                    <div class="headline01 smallpoint row row"><span>p</span><span>14</span></div>
                                </div>
                            </li>
                            <li class=clearfix>
                                <div class=subPoint_table>
                                    <div class="headline01 smallpoint">2</div>
                                    <div class="headline01 largepoint">FC Spinning Slammers</div>
                                    <div class="headline01 smallpoint row"><span>p</span><span>10</span></div>
                                </div>
                            </li>
                            <li class=clearfix>
                                <div class=subPoint_table>
                                    <div class="headline01 smallpoint">3</div>
                                    <div class="headline01 largepoint">FC Crimson Executioners</div>
                                    <div class="headline01 smallpoint row"><span>p</span><span>10</span></div>
                                </div>
                            </li>
                            <li class=clearfix>
                                <div class=subPoint_table>
                                    <div class="headline01 smallpoint">4</div>
                                    <div class="headline01 largepoint">FC Shaolin Robots</div>
                                    <div class="headline01 smallpoint row"><span>p</span><span>10</span></div>
                                </div>
                            </li>
                            <li class=clearfix>
                                <div class=subPoint_table>
                                    <div class="headline01 smallpoint">5</div>
                                    <div class="headline01 largepoint">FC Silent Xpress</div>
                                    <div class="headline01 smallpoint row"><span>p</span><span>10</span></div>
                                </div>
                            </li>
                            <li class=clearfix>
                                <div class=subPoint_table>
                                    <div class="headline01 smallpoint">6</div>
                                    <div class="headline01 largepoint">FC Dark Scorpions</div>
                                    <div class="headline01 smallpoint row"><span>p</span><span>10</span></div>
                                </div>
                            </li>
                            <li class=clearfix>
                                <div class=subPoint_table>
                                    <div class="headline01 smallpoint">7</div>
                                    <div class="headline01 largepoint">FC Cyborg Snakes</div>
                                    <div class="headline01 smallpoint row"><span>p</span><span>10</span></div>
                                </div>
                            </li>
                            <li class=clearfix>
                                <div class=subPoint_table>
                                    <div class="headline01 smallpoint">8</div>
                                    <div class="headline01 largepoint">FC Skull Killers</div>
                                    <div class="headline01 smallpoint row"><span>p</span><span>10</span></div>
                                </div>
                            </li>
                            
                        </ul>
                    </div>
                </div>
            </div>
            <?php } else { ?>
            <div class="matchSchedule_details row">
                <div class=match_next>
                    <div class="wrap_match_next right-triangle">
                        <div class=right-padding><h4 class=headline03>Standings</h4>

                            <p>Table</p></div>
                    </div>
                </div>
                <div class=match_versus-wrap>
                    <div class=wrap_match-innerdetails>
                        <ul class="point_table scrollable">
                            <?php
                                $index = 1;
                                foreach ($standings as $standing) {
                            ?>
                            <li class=clearfix>
                                <div class=subPoint_table>      
                                    <div class="headline01 smallpoint"><?php echo $index;?></div>
                                    <div class="headline01 largepoint"><?php echo $standing['team_name']?></div>
                                    <div class="headline01 smallpoint row row"><span>p</span><span><?php echo (int)$standing['total_points']?></span></div>
                                </div>
                            </li>
                            <?php
                                    $index++;
                                }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</section>