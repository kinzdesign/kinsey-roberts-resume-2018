<?php
  Page::registerGoogleCharts();
  Page::registerChart('harldByYear');
?>
          <p></p>
          <div class="row">
            <div id="chart_harld_by_year" class="col-lg-6" style="height: 400px;"></div>
            <div id="table_harld_by_year" class="col-lg-6" style="height: 400px;"></div>
          </div>
          <p></p>
          <hr/>
          <h3>Highlights</h3>
          <p></p>
          <ul>
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
