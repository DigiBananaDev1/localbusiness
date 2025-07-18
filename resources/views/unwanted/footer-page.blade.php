@include('header')
<style>
    .grow{
        font-size: 50px;
        font-weight: 700;
        color: #242481;
    }
    .adver{
        font-size: 25px;
        font-weight: 700;
        color: #cd1d09;
    }
    .card-body{
        text-align: center;
    }
    .features-head{
        text-align: center;
        font-size: 35px;
        margin-bottom: 30px;
        font-weight: 700;
    }
    .feature-section{
        background: #05056417;
    }

</style>
<div class="container p-5">
    <div class="row">
        <div class="col-md-5 col-sm-5">
            <h2 class="grow">Grow Your Business</h2>
            <p class="adver">Advertise with Loacl Bussiness - India's No. 1 Local Search Engine</p>
            <div class="start-now">
                <p>Let’s start to list your business</p>
                <form action="#">
                    <input type="tel" name="" id="" placeholder=" Mobile Number">
                    <button type="submit" class="start-btn" > Start Now</button>
                </form>
                <p>Already Registered? <a href="#">Sing In</a></p>
            </div>
            <ul class="list-circle">
                <li>Rank Ahead of Your Competition</li>
                <li>Find Ready to Buy Customers Instantly</li>
                <li>Track Leads & Competition Trends</li>
            </ul>
        </div>
        <div class="col-1"></div>
        <div class="col-md-6 col-sm-6">
            <div class="text-center">
                <img src="{{asset('public/assets/img/hero.png')}}" alt="" width="100%">
            </div>
        </div>
    </div>
</div>
<div class="feature-section ">
    <div class="container p-5">
        <h2 class="features-head">Features</h2>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <div class="col">
              <div class="card">            
                <div class="card-body">
                    <img src="{{asset('public/assets/img/list.png')}}" alt="">
                     <h6>Premium Listing</h6>
                     <p>Get higher visibility and exposure on Loacl Bussiness</p>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card">       
                <div class="card-body">
                    <img src="{{asset('public/assets/img/verify.png')}}" alt="">
                    <h6>Verified Seal</h6>
                    <p>Verify your business listing on Loacl Bussiness and improve your credibility</p>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card">            
                <div class="card-body">
                    <img src="{{asset('public/assets/img/cate.png')}}" alt="">
                    <h6>Online Catalogue</h6>
                    <p>Showcase your product and service offerings to potential customers</p>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card">            
                <div class="card-body">
                    <img src="{{asset('public/assets/img/m-banner.png')}}" alt="">
                    <h6>Mobile Banner</h6>
                    <p>Promote your business on competitor listings by targeting high-intent mobile users</p>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card">            
                <div class="card-body">
                    <img src="{{asset('public/assets/img/cate.png')}}" alt="">
                    <h6>Online Catalogue</h6>
                    <p>Showcase your product and service offerings to potential customers</p>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card">            
                <div class="card-body">
                    <img src="{{asset('public/assets/img/m-banner.png')}}" alt="">
                    <h6>Mobile Banner</h6>
                    <p>Promote your business on competitor listings by targeting high-intent mobile users</p>
                </div>
              </div>
            </div>
          </div>
    </div>
</div>
<div class="container mt-5" >
    <h2 class="features-head">Got a question?</h2>
    <div class="accordion" id="accordionExample">
        <div class="accordion-item">
          <h2 class="accordion-header" id="headingOne">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                What courses do aviation colleges offer?
            </button>
          </h2>
          <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
            <div class="accordion-body">
              <ul>
                <li><b>Pilot Training:</b> Courses to become a commercial or private pilot.</li>
                <li>Aircraft Maintenance Engineering: Programs focusing on the maintenance and repair of aircraft.</li>
                <li><b>Aviation Management: </b>Courses on the business and management side of the aviation industry.</li>
                <li><b>Air Traffic Control: </b>Training for managing aircraft movements on the ground and in the air.</li>
                <li><b>Cabin Crew Training:</b> Programs for aspiring flight attendants.</li>
                <li><b>Aeronautical Engineering: </b>Focuses on the design and development of aircraft.</li>
              </ul>
            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header" id="headingTwo">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                What are the eligibility criteria for admission to aviation colleges?
            </button>
          </h2>
          <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
            <div class="accordion-body">
                <li>Educational Qualifications: A minimum of high school completion, often with a focus on science and mathematics.</li>
                <li>Medical Fitness: A medical examination to ensure physical fitness, particularly for pilot training.</li>
                <li>Age Limit: Some courses have age restrictions, commonly between 17-30 years.</li>
                <li>Language Proficiency: Proficiency in English, as it is the primary language of aviation.</li>
            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header" id="headingThree">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                How long do aviation courses typically take to complete?
            </button>
          </h2>
          <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
            <div class="accordion-body">
                <ul>
                    <li>Pilot Training: 6 months to 2 years, depending on the type of license (private or commercial).</li>
                    <li>Aircraft Maintenance Engineering: 2 to 4 years.</li>
                    <li>Aviation Management: 1 to 4 years, depending on whether it is a diploma,      bachelor's, or master's program.</li>
                    <li>Air Traffic Control: 6 months to 1 year.</li>
                    <li>Cabin Crew Training: 6 months to 1 year.</li>
                    <li>Aeronautical Engineering: 4 years for a bachelor's degree.</li>
                </ul>
            </div>
          </div>
        </div>
      </div>
</div>
@include('footer')