<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php $this->load->view('templates/top.php');?>
<?php $this->load->view('templates/header.php');?>
   <body>
      <?php $this->load->view('templates/loginmenu.php');?>
      <main class="body-container">
      <div class="banner-container">
         <div class="carousel slide" data-ride="carousel">
           <div class="carousel-inner">
             <div class="carousel-item active">
                 <div class="container position-relative">
                 <div class="heading-container">
                     <h6>An Enterprise Solution for</h6>
                     <h2>Profitable Agriculture &<br> Rural Transformation</h2>
                     <!--<button class="btn btn-outline-info mt-2">Learn More</button>-->
                   </div>
                   </div>
                 <img src="<?php echo asset_url()?>img/home/slide-img1.jpg" class="img-fluid" alt="Slide 1" />
             </div>
           </div>
         </div>
         <div class="container position-relative">
            <form id="loginForm" class="user-login" name="sentMessage" action="<?php echo base_url('administrator/login');?>" method="post">
               <h3 class="">login</h3>
               <div class="form-group">
                  <input type="text" name="mobile_no" placeholder="Mobile Number" class="form-control numberOnly" id="mobile_no" minlength=10 maxlength=10 data-validation-required-message="Please enter your mobile no." required="required">
               </div>
               <div class="form-group">
                  <input type="password" name="password" placeholder="Password" class="form-control" pattern="\S{6,30}" title="Password should have atleast 6 characters."  id="password" data-validation-required-message="Please enter password." required="required">
               </div>

               <div class="form-group">
                  <button type="submit" name="save" id="sendMessageButton" class="btn btn-success w-100">Login</button>
               </div>

               <div class="login-links">
                  <div class="row">
                     <div class="col-5 text-left"><a href="#" class="new-user">New FPO?</a></div>
                     <div class="col-7 text-right"> <a href="#" class="f-pswd">Forgot Password?</a></div>
                  </div>
               </div>       
            </form>
         </div>
      </div>

      <div id="about-us" class="container">
         <section class="home-intro">
           <h2 class="text-uppercase border-bottom pb-3"><img src="<?php echo asset_url()?>img/home/logo.png"></h2>
           <h6 class="text-dark mb-3">One Platform, Multiple Benefits</h6>

           <p>
             Simple and user-friendly enterprise application to run Business to Farm and Farm to Fork. <br>An initiative of a team with long
             term vision to make agriculture profitable and transform the way of working in the eco system.
           </p>
         </section>

         <section class="fts-three mt-3">
           <div class="row">
             <div class="col-md-4 col-sm-4 text-center">
               <h4 class="clr-blue">Easy to Use</h4>
               <p>Farm Books is simple and innovative, so you will spend <br> less time on paper work and go digitally from
                 procurement to payment. </p>
             </div>

             <div class="col-md-4 col-sm-4 text-center">
               <h4 class="clr-blue">Powerful Features</h4>
               <p>Automation of crop information, timely <br>advising and tracking by click of a button. </p>
             </div>

             <div class="col-md-4 col-sm-4 text-center">
               <h4 class="clr-blue">Power of Digital</h4>
               <p>Farm Books lives in the cloud, so you can <br>securely access it from anywhere and anytime.</p>
             </div>
           </div>

         </section>

       </div>

       <section id="howitworks" class="howitworks-container">

         <h2 class="text-uppercase text-center pt-4 pb-4">how it works</h2>

         <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
           <div class="carousel-inner">
               <div class="carousel-item active">
                   <div class="container">
                     <div class="row">
                       <div class="col-md-3 col-sm-3 text-center">
                         <div class="icon-container">
                           <span class="d-inline-block hw-icon rounded-circle">
                             <img src="<?php echo asset_url()?>img/home/icon-h-profile.png">
                           </span>
                           <h5 class="hw-title">Profiling</h5>
                           <p class="hw-desc justify">
                             Organising farming community is an art. Creates unified and up to date farming community database to support and enhance
                             the quality of life engaged in the farming sector.
                           </p>
                         </div>
                       </div>
       
                       <div class="col-md-3 col-sm-3 text-center">
                         <div class="icon-container">
                           <span class="d-inline-block hw-icon rounded-circle">
                             <img src="<?php echo asset_url()?>img/home/icon-h-finance.png">
                           </span>
                           <h5 class="hw-title">Finance</h5>
                           <p class="hw-desc justify">
                             Generating Invoice, managing suppliers, managing customers, recording payment and generation of financial statement to fulfil
                             the requirements of stakeholders.
                           </p>
                         </div>
                       </div>
       
                       <div class="col-md-3 col-sm-3 text-center">
                         <div class="icon-container">
                           <span class="d-inline-block hw-icon rounded-circle">
                             <img src="<?php echo asset_url()?>img/home/icon-h-inventory.png">
                           </span>
                           <h5 class="hw-title">Inventory</h5>
                           <p class="hw-desc justify">
                             Managing the inventory from inward to outward with timely reports for smooth and efficient operation.
                           </p>
                         </div>
                       </div>
       
                       <div class="col-md-3 col-sm-3 text-center">
                         <div class="icon-container">
                           <span class="d-inline-block hw-icon rounded-circle">
                             <img src="<?php echo asset_url()?>img/home/icon-h-op.png">
                           </span>
                           <h5 class="hw-title">Operations</h5>
                           <p class="hw-desc justify">
                             Appointing and managing the office bearers, committees and professionals to run the organisation in an efficient manner.
                           </p>
                         </div>
                       </div>
       
                     </div>
                   </div>
                 </div>
       
                 <div class="carousel-item  ">
                   <div class="container">
                     <div class="row">
                       <div class="col-md-3 col-sm-3 text-center">
                         <div class="icon-container">
                           <span class="d-inline-block hw-icon rounded-circle">
                               <img src="<?php echo asset_url()?>img/home/icon-share.png">
                           </span>
                           <h5 class="hw-title">Share </h5>
                           <p class="hw-desc justify">
                               Unifying farmers into shareholders and automating the process to comply with the statutory norms.
                           </p>
                         </div>
                       </div>
       
                       <div class="col-md-3 col-sm-3 text-center">
                         <div class="icon-container">
                           <span class="d-inline-block hw-icon rounded-circle">
                             <img src="<?php echo asset_url()?>img/home/icon-crop.png">
                           </span>
                           <h5 class="hw-title">Crop</h5>
                           <p class="hw-desc justify">
                               To help the farmers to cultivate crops, to estimate the output, provide timely advice on the weeding, pest management and nutrients with post-harvest techniques. 
                           </p>
                         </div>
                       </div>
       
                       <div class="col-md-3 col-sm-3 text-center">
                         <div class="icon-container">
                           <span class="d-inline-block hw-icon rounded-circle">
                             <img src="<?php echo asset_url()?>img/home/icon-soil.png">
                           </span>
                           <h5 class="hw-title">Soil</h5>
                           <p class="hw-desc justify">
                               Advice on preparation of soil, testing, selection of crops to improve the productivity of the farming community.
                           </p>
                         </div>
                       </div>
       
                       <div class="col-md-3 col-sm-3 text-center">
                         <div class="icon-container">
                           <span class="d-inline-block hw-icon rounded-circle">
                             <img src="<?php echo asset_url()?>img/home/icon-production.png">
                           </span>
                           <h5 class="hw-title">Production</h5>
                           <p class="hw-desc justify">
                               Helps the Producer organisation to track the stages of production and reducing the wastage to improve profitability. 
                               </p>
                         </div>
                       </div>
       
                     </div>
                   </div>
                 </div>
       
                 <div class="carousel-item ">
                     <div class="container">
                       <div class="row">
                         <div class="col-md-3 col-sm-3 text-center">
                           <div class="icon-container">
                             <span class="d-inline-block hw-icon rounded-circle">
                               <img src="<?php echo asset_url()?>img/home/icon-marketting.png">
                             </span>
                             <h5 class="hw-title">Market </h5>
                             <p class="hw-desc justify">
                                 Creating market place for the farmers and producer organisation to avoid the dependence of middleman and double the income level. 
                             </p>
                           </div>
                         </div>
         
                         <div class="col-md-3 col-sm-3 text-center">
                           <div class="icon-container">
                             <span class="d-inline-block hw-icon rounded-circle">
                               <img src="<?php echo asset_url()?>img/home/icon-supplychain.png">
                             </span>
                             <h5 class="hw-title">Supply Chain</h5>
                             <p class="hw-desc justify">
                                 Efficient and timely dispatch to reach the consumer to attain the goal of Farm to Fork. 
                             </p>
                           </div>
                         </div>
         
                         <div class="col-md-3 col-sm-3 text-center">
                           <div class="icon-container">
                             <span class="d-inline-block hw-icon rounded-circle">
                               <img src="<?php echo asset_url()?>img/home/icon-ecommerce.png">
                             </span>
                             <h5 class="hw-title">E-Commerce </h5>
                             <p class="hw-desc justify">
                                 Creates online market place for the farming community to reach the super served. 
                             </p>
                           </div>
                         </div>
         
                         <div class="col-md-3 col-sm-3 text-center">
                           <div class="icon-container">
                             <span class="d-inline-block hw-icon rounded-circle">
                               <img src="<?php echo asset_url()?>img/home/icon-h-finance.png">
                             </span>
                             <h5 class="hw-title">Loan</h5>
                             <p class="hw-desc justify">
                                 To serve the farming community to get timely and adequate funding hassle free.     
                             </p>
                           </div>
                         </div>
         
                       </div>
                     </div>
                   </div>
                   <div class="carousel-item">
                       <div class="container">
                         <div class="row">
                           <div class="col-md-3 col-sm-3 text-center">
                             <div class="icon-container">
                               <span class="d-inline-block hw-icon rounded-circle">
                                 <img src="<?php echo asset_url()?>img/home/icon-hr.png">
                               </span>
                               <h5 class="hw-title">Human Resource  </h5>
                               <p class="hw-desc justify">
                                   Managing the resources of producer organisation from recruitment to retirement.    
                               </p>
                             </div>
                           </div>
           
                           <div class="col-md-3 col-sm-3 text-center">
                             <div class="icon-container">
                               <span class="d-inline-block hw-icon rounded-circle">
                                 <img src="<?php echo asset_url()?>img/home/icon-h-finance.png">
                               </span>
                               <h5 class="hw-title">GST</h5>
                               <p class="hw-desc justify">
                                   Automate the generation of GST compliance invoices to submission of regular reports to the statutory authorities. 
                               </p>
                             </div>
                           </div>
           
                           <div class="col-md-3 col-sm-3 text-center">
                             <div class="icon-container">
                               <span class="d-inline-block hw-icon rounded-circle">
                                 <img src="<?php echo asset_url()?>img/home/icon-h-inventory.png">
                               </span>
                               <h5 class="hw-title">Livestock</h5>
                               <p class="hw-desc justify">
                                   Manging the livestock from birth to death and timely advice from the experts. 
                               </p>
                             </div>
                           </div>
           
                           <div class="col-md-3 col-sm-3 text-center">
                             <div class="icon-container">
                               <span class="d-inline-block hw-icon rounded-circle">
                                 <img src="<?php echo asset_url()?>img/home/icon-h-op.png">
                               </span>
                               <h5 class="hw-title">F-Diary </h5>
                               <p class="hw-desc justify">
                                   Manage the day to day affairs of farmers by themselves.    
                               </p>
                             </div>
                           </div>
           
                         </div>
                       </div>
                     </div>
       
                     <div class="carousel-item ">
                         <div class="container">
                           <div class="row">
                             <div class="col-md-3 col-sm-3 text-center">
                               <div class="icon-container">
                                 <span class="d-inline-block hw-icon rounded-circle">
                                   <img src="<?php echo asset_url()?>img/home/icon-h-profile.png">
                                 </span>
                                 <h5 class="hw-title">Labour </h5>
                                 <p class="hw-desc justify">
                                     Organising and employing labours, managing daily and weekly payments with advance payment options and contract work.  
                                 </p>
                               </div>
                             </div>
             
                             <div class="col-md-3 col-sm-3 text-center">
                               <div class="icon-container">
                                 <span class="d-inline-block hw-icon rounded-circle">
                                   <img src="<?php echo asset_url()?>img/home/icon-h-finance.png">
                                 </span>
                                 <h5 class="hw-title">Organic Farming </h5>
                                 <p class="hw-desc justify">
                                     Producing organic food for the future generation needs collective efforts and timely advice. Farm books provides enough resources for the future generation. 
                                 </p>
                               </div>
                             </div>
             
                             <div class="col-md-3 col-sm-3 text-center">
                               <div class="icon-container">
                                 <span class="d-inline-block hw-icon rounded-circle">
                                   <img src="<?php echo asset_url()?>img/home/icon-h-inventory.png">
                                 </span>
                                 <h5 class="hw-title">Zero Budget </h5>
                                 <p class="hw-desc justify">
                                     Cultivation and making profit without cost makes the agriculture sustainable. In-depth knowledge transformation to make the zero-budget realistic. 
                                 </p>
                               </div>
                             </div>
             
                             <div class="col-md-3 col-sm-3 text-center">
                               <div class="icon-container">
                                 <span class="d-inline-block hw-icon rounded-circle">
                                   <img src="<?php echo asset_url()?>img/home/icon-h-op.png">
                                 </span>
                                 <h5 class="hw-title">F-Connect  </h5>
                                 <p class="hw-desc justify">
                                     Connecting the farmers to share their knowledge themselves make the job easier. F-Connect connects the farmers of different vertical in common platform.    
                                 </p>
                               </div>
                             </div>
             
                           </div>
                         </div>
                       </div>
       
                       <div class="carousel-item ">
                           <div class="container">
                             <div class="row">
                               <div class="col-md-3 col-sm-3 text-center">
                                 <div class="icon-container">
                                   <span class="d-inline-block hw-icon rounded-circle">
                                     <img src="<?php echo asset_url()?>img/home/icon-h-profile.png">
                                   </span>
                                   <h5 class="hw-title">FPO- Connect  </h5>
                                   <p class="hw-desc justify">
                                       Farmers need precise producer organisations to join and market their produces. Our platform support farmers to identify producer organisation anywhere based on their requirements.    
                                   </p>
                                 </div>
                               </div>
               
                               <div class="col-md-3 col-sm-3 text-center">
                                 <div class="icon-container">
                                   <span class="d-inline-block hw-icon rounded-circle">
                                     <img src="<?php echo asset_url()?>img/home/icon-h-finance.png">
                                   </span>
                                   <h5 class="hw-title">Market Price  </h5>
                                   <p class="hw-desc justify">
                                       Delivering daily preferential market price helps the farmers on decision making.    
                                   </p>
                                 </div>
                               </div>
               
                               <div class="col-md-3 col-sm-3 text-center">
                                 <div class="icon-container">
                                   <span class="d-inline-block hw-icon rounded-circle">
                                     <img src="<?php echo asset_url()?>img/home/icon-h-inventory.png">
                                   </span>
                                   <h5 class="hw-title">Locate  </h5>
                                   <p class="hw-desc justify">
                                       Locating the stakeholders of entire eco system is essential keeping in mind various precious resources.    
                                   </p>
                                 </div>
                               </div>
               
                               <div class="col-md-3 col-sm-3 text-center">
                                 <div class="icon-container">
                                   <span class="d-inline-block hw-icon rounded-circle">
                                     <img src="<?php echo asset_url()?>img/home/icon-h-op.png">
                                   </span>
                                   <h5 class="hw-title">Insurance  </h5>
                                   <p class="hw-desc justify">
                                       Timely securing crops, live stocks and farm implements saves farmers in distress. It helps to get policy, renew and claim when untoward incident happens.    
                                   </p>
                                 </div>
                               </div>
               
                             </div>
                           </div>
                         </div>
       
                         <div class="carousel-item ">
                             <div class="container">
                               <div class="row">
                                 <div class="col-md-3 col-sm-3 text-center">
                                   <div class="icon-container">
                                     <span class="d-inline-block hw-icon rounded-circle">
                                       <img src="<?php echo asset_url()?>img/home/icon-share.png">
                                      </span>
                                     <h5 class="hw-title">M-Rental </h5>
                                     <p class="hw-desc justify">
                                         Ploughing at right time make cultivation easier. M-Rental helps farmers to share and hire farm implements without additional cost. 
                                            </p>
                                   </div>
                                 </div>          
                               </div>
                             </div>
                           </div>

           </div>
           <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
             <span class="carousel-control-prev-icon" aria-hidden="true"></span>
             <span class="sr-only">Previous</span>
           </a>
           <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
             <span class="carousel-control-next-icon" aria-hidden="true"></span>
             <span class="sr-only">Next</span>
           </a>
         </div>

       </section>

       <section id="whomitworks" class="whomitoworks-container">
         <div class="container">
           <div class="card">
             <div class="card-header">
               <h4 class="text-uppercase m-0">whom it works</h4>
             </div>
             <div class="card-body">
               <p class="hw-desc justify">                 
Farm Books is an enterprise application that provides all the operations done by FPO under a single cost-effective platform. It is for the Farmer Producers Organisations (FPO) and Farmers to maintain their day to day activities in a real time manner. Farm Books is a centralized approach to business processes of producer organisations. With Farm Books, you can collect, store, manage, and interpret data from various business units which will ultimately improve the overall performance. It is used to automate back-office tasks and streamline cross-departmental workflows and drive efficiency, lower costs and increase profitability.
</br></br>Business processes like accounting, sales, marketing, production, inventory, share, crops, operation, fixed assets, supply chain, loan, e-commerce and human resource are integrated in one platform. It&#39;s easier to collect and access data across the organization, streamlining cross-departmental workflows. Likewise, Farm Books automates day-to-day tasks like entering data or generating reports. Repetitive processes are eliminated, freeing teams to focus on their core deliverables. Farm Books also provides CEO&#39;s and key stakeholders with quick look-ups. Dashboards allow decision-makers to glance at key performance indicators across the organization. If they wish to investigate further, CEO&#39;s can drill down to details in a few clicks.
</p></br><p class="hw-desc justify"><strong>FPO</strong></br>
Farm Books is an end to end system for FPOs to onboard farmers in their locality, make the farmers as members of FPO through the process of issue of share application, share allotment and issue of share certificates to ensure transparency. Make the process smoother for Appointment, remuneration and training of Directors, Committees and CEO. Assist in conducting meetings to fulfil the requirements of statutory norms which is otherwise a grey area for anyone. 
</p></br><p class="hw-desc justify"><strong>Farmers</strong></br>
Create unified and up to date farming community database to support and enhance the quality of life engaged in the farming sector. Through the mobile application, farmers themselves manage their land holding, farm equipment, livestock, cropping, harvesting and post-harvest process to improve their efficiency and profitability. Inbuilt mechanism to send regular alerts to farmers on weed management, fertilizer management and pesticide management.                </p>
             </div>
           </div>
         </div>

       </section>

       <section id="pricing" class="pricing-container">
         <div class="container">
           <div class="card">
             <div class="card-header">
               <h4 class="text-uppercase m-0">pricing</h4>
             </div>

             <div class="card-body">
               <div class="row">
                 <div class="col-lg-5 col-md-5 col-sm-12 text-center">
                   <span class="icon_mob d-inline-block mb-2">
                     <img src="<?php echo asset_url()?>img/home/icon-m.png">
                   </span>
                   <h4 class="title-mob">Mobile App</h4>
                   <h6>for the primary producers is</h6>
                   <h4 class="title-mob">Free!</h4>

                   <div class="price-para mt-2">
                     <h4>FPO Introductory <strong>Offer</strong> 
                     <p class="">till 31st May 2019</p>
                   </div>

                   <div class="price-para mt-2">
                       <h4><strong>Buy Now</strong> @ <i class="fa fa-inr"></i> 30,000/- per annum</h4>
                       <p class="">Plus GST</p>
                       <h4><strong>All modules combo offer.</strong></h4>
                     </div>

                 </div>

                 <div class="col-lg-7 col-md-7 col-sm-12">
                   <div class="card">
                     <div class="card-header" style="background-color:#2665ab;">
                       <h6 class="m-0 text-white">Everything you need to run your FPO</h6>
                     </div>
                     <div class="card-body">
                       <table class="table">
                         <tbody>
                           <tr>
                             <td>Manage Shareholders and Share Certificates</td>
                             <td class="text-center text-success"><i class="fa fa-check"></i></td>
                           </tr>
                           <tr>
                             <td>Manage farmers land, farm equipment, livestock and crop </td>
                             <td class="text-center text-success"><i class="fa fa-check"></i></td>
                           </tr>
                           <tr>
                             <td>Create & send professional GST invoices</td>
                             <td class="text-center text-success"><i class="fa fa-check"></i></td>
                           </tr>
                           <tr>
                             <td>Track sales, suppliers, customers and payments</td>
                             <td class="text-center text-success"><i class="fa fa-check"></i></td>
                           </tr>
                           <tr>
                             <td>Manage Loan from Banks & Financial Institutions </td>
                             <td class="text-center text-success"><i class="fa fa-check"></i></td>
                           </tr>
                           <tr>
                             <td>Record Inventory </td>
                             <td class="text-center text-success"><i class="fa fa-check"></i></td>
                           </tr>
                           <tr>
                             <td>Unlimited user access </td>
                             <td class="text-center text-success"><i class="fa fa-check"></i></td>
                           </tr>
                           <tr>
                             <td>Generate GST Reports </td>
                             <td class="text-center text-success"><i class="text-warning">Coming Soon</i></td>
                           </tr>
                           <tr>
                             <td>Manage production </td>
                             <td class="text-center text-success"><i class="text-warning">Coming Soon</i></td>
                           </tr>
                           <tr>
                             <td>Soil Management</td>
                             <td class="text-center text-success"><i class="text-warning">Coming Soon</i></td>
                           </tr>
                           <tr>
                             <td>Supply Chain</td>
                             <td class="text-center text-success"><i class="text-warning">Coming Soon</i></td>
                           </tr>
                         </tbody>
                       </table>
                     </div>
                   </div>
                 </div>

               </div>
             </div>

           </div>

         </div>
       </section>

      </main>

  
      <?php $this->load->view('templates/footer.php');?>      
      <?php $this->load->view('templates/bottom.php');?>		     	
   </body>
</html>