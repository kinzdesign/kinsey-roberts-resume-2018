<?php
  Page::registerGoogleCharts();
  Page::registerChart('securityByYear');
?>
          <p>Until 2009, housing used paper forms to track access cards and physical keys. This led to delays, confusion, and missed billing opportunities.</p>
          <p>These features rose to the top of the <a href="<?php echo Project::getBySlug('harld')->url(); ?>" data-category="Project - Physical Security" data-action="Body Click - HARLD">Housing And Residence Life Database (HARLD)</a> feature heap. Cards would be integrated in 2009 with keys following in 2010. August move-in presented a firm deadline for the project each year.</p>
          <p>I developed the <abbr title="Graphical User Interface">GUI</abbr> screens and <abbr title="Point of Service">POS</abbr> hardware integration. After my supervisor created the database, I populated it with the relevant data. I integrated card and key issuing into the existing check-in wizard. I also built tools to replace lost keys, automate billing, and maintain data as locks were re-keyed.</p>
          <p>I finished in time for move-in both years and the initial roll-out was  fairly smooth. As you can see below, <abbr title="Housing and Residence Life Database">HARLD</abbr> tracked approximately 12,000 cards and keys per year. This represented countless hours no longer spent with paper forms and manual billing.</p>
          <hr/>
          <div id="chart_securityByYear" style="height: 400px;"></div>
          <hr/>
          <h2>Key Card Issuing Workflow</h2>
          <div class="row">
            <div class="col-sm-6">
              <h3 class="bg-danger padding-all-small">Before</h3>
              <ol class="list-margin-bottom">
                <li>Student IT staff pre-programmed replacement key cards for each room</li>
                <li>An Excel sheet tracked the active and replacement card ID numbers</li>
                <li>Key cards were delivered to housing offices and stored in binders</li>
                <li>When a student lost a key card, housing staff would complete a paper form and issue the replacement card</li>
                <li>Students had a few days to return the lost card to reduce the amount charged to their student account</li>
                <li>Full-time housing staff manually entered lost card charges in batches once the grace period passed</li>
                <li>Every few days, student IT staff picked up one copy of the lost card forms</li>
                <li>Student IT staff encoded new replacement cards and updated the spreadsheet</li>
                <li>Student IT staff would deliver the new replacement cards to the housing offices</li>
                <li>Student housing staff filed the replacement cards into the lock-out binders</li>
              </ol>
              <p>Elapsed time: a few <strong><em>days</em></strong></p>
            </div>
            <div class="col-sm-6">
              <h3 class="bg-success padding-all-small">After</h3>
              <ol class="list-margin-bottom">
                <li><abbr title="Housing and Residence Life Database">HARLD</abbr> prompted housing staff to insert a spare card into the card encoder</li>
                <li>The encoder read the card ID number off of track 3 as the card entered</li>
                <li><abbr title="Housing and Residence Life Database">HARLD</abbr> issued the card, levied a lost card charge if needed, and got track 2 data from the database</li>
                <li>The card encoder wrote to track 2 as the card exited, pulled the card back in to verify the data, then ejected the card</li>
                <li>When someone found or returned a card, housing staff inserted it into the card encoder</li>
                <li>If the grace period had not elapsed, <abbr title="Housing and Residence Life Database">HARLD</abbr> issued a partial refund to the student's account</li>
                <li>Upon ejecting the card, the encoder erased track 2 to prepare the card for reuse</li>
              </ol>
              <p>Elapsed time: a few <strong><em>seconds</em></strong></p>
            </div>
          </div>
