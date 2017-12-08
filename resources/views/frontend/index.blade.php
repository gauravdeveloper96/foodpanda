@extends('frontend.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="col-sm-12">
        <p class="text">Order delicious food online!</p>
        <p class="para-text">Order food online from the best restaurants near you</p>
    </div>
    <div class="js-location-search location-search location-search-main-page  location_city_area  ">
        <div class="location-search-inner">
            <form name="" method="get" action="/location-suggestions" role="form" class="form-vertical" novalidate="novalidate" autocomplete="off">
                <div class="city">
                    <label for="cityId" class="required">Enter your city</label>
                    <div class="dropdown-typeahead-wrapper" id="wrapper-element-1"><select id="cityId" name="cityId" data-prefill="location.cityId" class="form-control" placeholder="Enter a city"><option value="11">Bangalore</option><option value="12">Chennai</option><option value="432202">Delhi</option><option value="431264">Gurgaon</option><option value="17">Hyderabad</option><option value="18">Kolkata</option><option value="27">Mumbai</option><option value="185">Nagpur</option><option value="3">Noida</option><option value="10">Pune</option><option disabled="disabled">More Cities</option><option value="top_cities">Popular Cities</option><option value="126">Agra</option><option value="16">Ahmedabad-Gandhinagar</option><option value="127">Ahmednagar</option><option value="128">Ajmer</option><option value="222">Aligarh</option><option value="129">Allahabad</option><option value="273">Ambaji</option><option value="130">Ambala</option><option value="223">Amravati</option><option value="131">Amritsar</option><option value="132">Anand</option><option value="133">Ankleshwar</option><option value="134">Asansol</option><option value="135">Aurangabad</option><option value="136">Baddi</option><option value="287">Badlapur</option><option value="224">Baramati</option><option value="137">Bareilly</option><option value="225">Belgaum</option><option value="271">Bellary</option><option value="139">Bharuch</option><option value="138">Bhatinda</option><option value="140">Bhavnagar</option><option value="141">Bhilai</option><option value="226">Bhiwadi</option><option value="227">Bhiwani</option><option value="142">Bhopal</option><option value="228">Bhubaneswar</option><option value="274">Bhuj</option><option value="143">Bilaspur</option><option value="144">Burdwan</option><option value="175">Calicut</option><option value="229">Chandigarh</option><option value="278">Chandrapur</option><option value="171">Cochin</option><option value="145">Coimbatore</option><option value="230">Cuttack</option><option value="267">Dalhousie</option><option value="146">Daman</option><option value="147">Darjeeling</option><option value="148">Dehradun</option><option value="279">Dewas</option><option value="149">Dhanbad</option><option value="231">Dharmsala</option><option value="232">Durg</option><option value="150">Durgapur</option><option value="233">Erode</option><option value="5">Faridabad</option><option value="152">Gandhidham</option><option value="153">Gangtok</option><option value="235">Ghaziabad</option><option value="154">Goa</option><option value="6">Greater Noida</option><option value="155">Gulbarga</option><option value="156">Guntur</option><option value="157">Guwahati</option><option value="158">Gwalior</option><option value="277">Hadapsar</option><option value="236">Haldwani</option><option value="160">Haridwar</option><option value="161">Hisar</option><option value="276">Hoogly</option><option value="237">Hoshiarpur</option><option value="238">Hosur</option><option value="159">Howrah</option><option value="162">Hubli</option><option value="4">Indirapuram-Ghaziabad</option><option value="22">Indore</option><option value="163">Jabalpur</option><option value="30">Jaipur</option><option value="164">Jalandhar</option><option value="165">Jalgaon</option><option value="166">Jammu</option><option value="239">Jamnagar</option><option value="280">Jhansi</option><option value="262">Jodhpur</option><option value="240">Kakinada</option><option value="241">Kanchipuram</option><option value="169">Kanpur</option><option value="242">Karad</option><option value="170">Karnal</option><option value="270">Karur</option><option value="281">Katni</option><option value="282">Khandwa</option><option value="243">Khanna</option><option value="244">Kharar</option><option value="172">Kodaikanal</option><option value="173">Kolhapur</option><option value="245">Korba</option><option value="174">Kota</option><option value="176">Kurukshetra</option><option value="246">Latur</option><option value="177">Lonavala</option><option value="178">Lucknow</option><option value="179">Ludhiana</option><option value="180">Madurai</option><option value="181">Mahabaleshwar</option><option value="247">Manesar</option><option value="20">Mangalore</option><option value="248">Mathura</option><option value="182">Meerut</option><option value="249">Mohali</option><option value="269">Moodbidri</option><option value="183">Moradabad</option><option value="28">Mumbai - Navi Mumbai</option><option value="29">Mumbai - Thane</option><option value="184">Mussoorie</option><option value="23">Mysuru</option><option value="250">Nainital</option><option value="186">Nashik</option><option value="187">Navsari</option><option value="283">Neemuch</option><option value="251">Nellore</option><option value="188">Ooty</option><option value="263">Panaji</option><option value="252">Panchkula</option><option value="189">Panipat</option><option value="253">Pathankot</option><option value="190">Patiala</option><option value="191">Patna</option><option value="254">Pondicherry</option><option value="275">Porbandar</option><option value="192">Puri</option><option value="193">Raipur</option><option value="255">Rajahmundry</option><option value="25">Rajkot</option><option value="256">Rajnandgaon</option><option value="194">Ranchi</option><option value="284">Ratlam</option><option value="285">Rewa</option><option value="195">Rewari</option><option value="196">Rohtak</option><option value="197">Roorkee</option><option value="198">Rourkela</option><option value="199">Rudrapur</option><option value="286">Sagar</option><option value="200">Saharanpur</option><option value="201">Salem</option><option value="202">Sambalpur</option><option value="203">Sangli</option><option value="268">Sangrur</option><option value="204">Satara</option><option value="205">Secunderabad</option><option value="206">Shillong</option><option value="207">Shimla</option><option value="208">Shirdi</option><option value="209">Siliguri</option><option value="210">Solan</option><option value="211">Solapur</option><option value="257">Sonipat</option><option value="19">Surat</option><option value="213">Thrissur</option><option value="214">Tiruchirapalli</option><option value="215">Tiruppur</option><option value="212">Trivandrum</option><option value="216">Tumkur</option><option value="265">Udaipur</option><option value="266">Udupi</option><option value="217">Ujjain</option><option value="21">Vadodara</option><option value="26">Vapi</option><option value="218">Varanasi</option><option value="258">Vellore</option><option value="259">Vijaywada</option><option value="24">Vishakhapatnam</option><option value="219">Warangal</option><option value="260">Yamunanagar</option><option value="220">Zirakpur</option></select></div>
                   

                    
                </div>

                <div class="area">
                    <label for="area" class="required">Enter your area</label>
                    <input  type="text" class="enter-area"  value="Enter your area"/>
                </div>
                <div class="find-food">
                    <button type="submit" id="button" name="button" class="btn btn-primary btn-block">Show restaurants</button>

                   
                </div>
               
            </form>
        </div>
    </div>
    <div class="container-overlay"></div>
</div>

<div class="popular-restro">
    <div class="popular-head">
        <h2>Popular This Month In India</h2>

    </div>
    <div class="popular-images">
        {{ Html::image('img/frontend/biryani.jpeg','',array('class' => 'thumb')) }}
        {{ Html::image('img/frontend/yochina.jpeg','', array('class' => 'thumb')) }}
        {{ Html::image('img/frontend/papjohns.png','', array('class' => 'thumb')) }}
        {{ Html::image('img/frontend/pizzahut.jpeg','', array('class' => 'thumb')) }}
        {{ Html::image('img/frontend/rollmall.png','', array('class' => 'thumb')) }}
        {{ Html::image('img/frontend/br.png','', array('class' => 'thumb')) }}
        {{ Html::image('img/frontend/box8.png','', array('class' => 'thumb')) }}
        {{ Html::image('img/frontend/subway.jpeg','', array('class' => 'thumb')) }}
    </div>
</div>
<div class="popular-restro">
    <div class="popular-head">
        <h2>India's Most Trusted Restaurants</h2>

    </div>
    <div class="trusted-images">
        {{ Html::image('img/frontend/pic1.jpg','',array('class' => 'thumb')) }}
        {{ Html::image('img/frontend/pic2.jpg','', array('class' => 'thumb')) }}
        {{ Html::image('img/frontend/pic3.jpg','', array('class' => 'thumb')) }}
        {{ Html::image('img/frontend/pic4.jpg','', array('class' => 'thumb')) }}
        {{ Html::image('img/frontend/pic5.jpg','', array('class' => 'thumb')) }}
        {{ Html::image('img/frontend/pic6.jpg','', array('class' => 'thumb')) }}
        {{ Html::image('img/frontend/pic7.jpg','', array('class' => 'thumb')) }}
        {{ Html::image('img/frontend/pic8.jpg','', array('class' => 'thumb')) }}
    </div>
</div>

@endsection