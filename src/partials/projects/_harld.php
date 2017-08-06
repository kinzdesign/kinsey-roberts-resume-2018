<?php
  Page::registerGoogleCharts();
  Page::registerChart('harldByYear');
?>
          <h3>Responsibilities</h3>
          <ul>
            <li>Developed UI clients (desktop, web, and mobile) and cross-platform business objects</li>
            <li>Provided tier 1.5 support to end users</li>
            <li>Delivered rapid bug fixes to keep the offices running</li>
            <li>Communicated proactively with end users to identify pain points</li>
            <li>Observed end users to identify potential optimizations</li>
            <li>Expanded point-of-service class library to include new hardware</li>
          </ul>
          <hr/>
          <h3>Summary</h3>
          <p>HARLD is a custom multi-client, multi-platform system that powers the day-to-day operations of Case Western Reserve University's housing, residence life, greek life, and student conduct offices.</p>
          <p>University staff were constantly being asked to do more with less as the university went through some financial stress during the economic downturn, and HARLD had already proven its worth by optimizing workflows and automating as much as possible. </p>
          <p>I inherited HARLD at a mature state and during my time as the primary developer for HARLD, I expanded its scope to meet the departments' needs, adding new features, modules, workflows, and clients to the software.</p>
          <p>The office was small and only had one developer, so I had to build strong relationships with stakeholders to discover needs, as well as research and learn various technologies to deliver the best product possible. </p>
          <p>I nurtured HARLD through a major growth spurt, with increasing traffic in existing workflows and the addition of new objects being tracked and managed. Note the massive uptick in package volume (in blue) beginning in 2011, as well as the addition of access badges (green) in 2009 and physical keys (purple) in 2010 in the graph below.</p>
          <div class="row padding-both-large">
            <div id="chart_harld_by_year" class="col-lg-6" style="height: 400px;"></div>
            <div id="table_harld_by_year" class="col-lg-6" style="height: 400px;"></div>
          </div>
          
          <hr/>
          <h3>Highlights</h3>
          <p>There were plenty of challenging and rewarding experiences while working on HARLD, but these are a few that stick out:</p>
          <ul>
            <li>
              <h4>Consolidated User Control Vendors to Save Money</h4>
              <p>The third version of the HARLD desktop client was originally written using Infragistics' UI controls for .NET, but all of our web infrastructure used Telerik's UI controls for ASP.NET and our Telerik license included the Windows Forms UI controls as well. I was told that historically neither vendor had been delivering excellence on both platforms. Over time, Telerik's desktop controls had matured into a very viable option, but my predecessor was well versed in Infragistics' syntaxes, so inertia kept them on the two-vendor solution.</p>
              <p>Since I did not have experience with either, my then-supervisor gave me the option of a "one-time, no-looking-back" switch. I looked hard at both vendors and played around with demo projects. Visually and functionally, they were well-matched. Syntactically, I had a slight preference for Telerik. Fiscally, it made no sense to pay the annual licenses on both, so I made the recommendation that we consolidate and use Telerik UI controls across the board, saving, as I recall, over $1000 per year during a time when budgets were extra-tight at the university.</p>
              <p>This switch did require me to throw out much of the UI code that my predecessor had written for version 3 of the desktop client, as there was no simple transition from Infragistics to Telerik. I was, however, able to reuse most of my predecessor's design decisions and deliver a final product that looked very similar to the original mockups and demos.</p>
            </li>
            <li>
              <div class="col-sm-3 col-md-6 pull-right">
                <div class="row">
                  <div class="col-sm-12 col-md-6">
                    <img src="/assets/images/TT3100.jpg" alt="TT3100 signature pad, with an angular, dated design and monochrome screen." class="img-responsive pull-right" />
                    Before: TT3100 signature pad
                  </div>
                  <div class="col-sm-12 col-md-6">
                    <img src="/assets/images/L4150.jpg" alt="Hypercom L4150 transaction terminal, with a rounded, modern design and color screen." class="img-responsive pull-right" />
                    After: Hypercom L4150 transaction terminal
                  </div>
                </div>
              </div>
              <h4>Equinox Transaction Terminals</h4>
              <p>Students swiped their university ID card in a transaction terminal at the front desk to pull up their packages. For years, HARLD had used the TT3100 model, which were well beyond end-of-life. I was tasked with finding and integrating a replacement model.</p>
              <p>PCI DSS rules had evolved significantly and transaction terminals were designed much more securely, including some models that encoded the magnetic card data at the read head. We needed unencrypted access to the data on university ID cards, so I had to contact vendors to see what our options were. Given that we would only be ordering a couple dozen units, many vendors weren't forthcoming with pre-sale technical information. Hypercom (which would later be acquired by VeriFone and rebranded as Equinox Payments) was able to meet our needs with the L4150.</p>
              <p>The functionality of the two models was quite different. The old TT3100 were very much peripherals where the host computer directly controlled the transaction terminals (e.g. telling it what text to draw where). The new L4150 were standalone devices running Linux and the host computer merely told the terminal what to do in more general terms (e.g. telling it to show a predefined form). This required some creativity during the integration, especially since the signature data format was <em>vastly</em> different. The desktop HARLD client would need to be able to display both signature formats in order to handle legacy data, so I had to write a function to translate from one format to the other. This required implementing a BitStream class, as the data format had commands of varying bit-widths. </p>
            </li>
          </ul>
