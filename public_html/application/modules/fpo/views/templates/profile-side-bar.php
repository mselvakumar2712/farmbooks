        <ul class="nav navbar-nav">
            <?php if($_SESSION['user_type']=='0'){?>
            <?php } else if($_SESSION['user_type']=='3'){?>
            <li class="menu-item-has-children dropdown <?php  if($page == 'FPG' ){echo 'show open';}?>">
                <a href="<?php echo base_url('fpo/fpg');?>" class="dropdown-toggle" aria-haspopup="true" <?php echo $page_title == 'List FPG' ||'Add FPG' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>> <i class="menu-icon fa fa-users"
                      aria-hidden="true"></i><span class="ml-1"> FPG</span></a>
            </li>
            <li class="menu-item-has-children dropdown <?php  if($page == 'FIG' ){echo 'show open';}?>">
                <a href="<?php echo base_url('fpo/fig');?>" aria-haspopup="true" <?php echo $page_title == 'List FIG' ||'Add FIG' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>><i class="menu-icon fa fa-users" aria-hidden="true"></i><span
                      class="ml-1"> FIG</span></a>
            </li>
            <li class="menu-item-has-children dropdown <?php  if($page == 'FIG Representative' ){echo 'show open';}?>">
                <a href="<?php echo base_url('fpo/fig/figrepresentativelist');?>" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fas fa-user-tie" aria-hidden="true"></i><span class="ml-1">FIG Representative</span></a>
            </li>            
            <?php }?>
        </ul>
