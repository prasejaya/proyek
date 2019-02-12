<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->

        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?php echo base_url('assets/img/avatar5.png'); ?>" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
                <p>Welcome...</p>
                <p><?php echo $this->session->userdata('namapegawai'); 

                ?>  </p>
            </div>
        </div>

        <!-- search form -->                    
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header bg-blue-active">MAIN NAVIGATION</li>     
                <?php
                   $this->db->select('mr.idmenu, m.nama_menu,m.icon,m.link,m.parent')
                         ->from ('menu m')
                         ->join('menurole mr', 'm.id_menu = mr.idmenu')
                         ->where('idjabatan', $this->session->userdata('idjabatan'))
                          ->where('parent','null');
                    $main = $this->db->get(); 
                    foreach ($main->result() as $m) {
                        // chek ada submenu atau tidak
                        $this->db->select('mr.idmenu, m.nama_menu,m.icon,m.link,m.parent')
                         ->from ('menu m')
                         ->join('menurole mr', 'm.id_menu = mr.idmenu')
                         ->where('idjabatan', $this->session->userdata('idjabatan'))
                         ->where('parent',$m->idmenu);
                        $sub = $this->db->get();
                        if ($sub->num_rows() > 0   ) {
                            // buat menu + sub menu
                            $uri = $this->uri->segment(1);
                            $idclass = $this->db->get_where('menu', array('link' => $uri))->row_array();
                            if ($m->idmenu == $idclass['parent']) {
                                $class = "active treeview";
                            } else {
                                $class = "";
                            }
                            echo '<li class=' . $class . '>' . anchor($m->link, '<i class="' . $m->icon . '"></i>
                            <span>' . strtoupper($m->nama_menu) . '</span>
                            <b class="fa fa-angle-left pull-right"></b>', array('class' => 'dropdown-toggle'));
                            echo "<ul class='treeview-menu'>";
                            foreach ($sub->result() as $s) {
                                $uri = $this->uri->segment(1);

                                if ($s->link == $uri) {
                                    $class1 = "active treeview";
                                } else {
                                    $class1 = "";
                                }
                                echo '<li class=' . $class1 . '>' . anchor($s->link, '<i class="' . $s->icon . '"></i>' . strtoupper($s->nama_menu)) . '</li>';
                            }
                            echo "</ul>";
                            echo '</li>';
                        } else {
                            $uri = $this->uri->segment(1);
                            if ($m->link == $uri) {
                                $class2 = "active";
                            } else {
                                $class2 = "";
                            }
                            echo '<li class=' . $class2 . '>' . anchor($m->link, '<i class="' . $m->icon . ' fa-lg">
                            </i>  <span>' . strtoupper($m->nama_menu) . '</span>') . '</li>';
                        }
                    }
                ?>

        </ul><!--/.nav-list-->             
    </section>
    <!-- /.sidebar -->
</aside>
