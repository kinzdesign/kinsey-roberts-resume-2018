<?php
  Page::registerGoogleCharts();
  Page::registerChart('packagesBoth');
?>
          <p>All packages for students living on campus were delivered to one of two Housing Area Offices. These offices logged and stored packages until students retrieved them. Mailroom traffic grew as online shopping and <abbr title="Case Western Reserve University">CWRU</abbr>'s geographical reach increased. Traffic was bursty, with spikes at the beginning of each semester.</p>
          <div class="row">
            <div class="col-md-4 col-lg-5">
              <div id="chart_packagesByYear" style="width: 100%; height: 300px;"></div>
            </div>
            <div class="hidden-xs hidden-sm col-md-8 col-lg-7">
              <div id="chart_packagesByMonth" style="width: 100%; height: 300px;"></div>
            </div>
          </div>
          <p>A piece of software called <a href="<?php echo Project::getBySlug('harld')->url(); ?>" data-category="Project - Mailroom" data-action="Body Click - HARLD">Housing And Residence Life Database (HARLD)</a> managed packages. The mailroom integration occurred years before I began to maintain <abbr title="Housing and Residence Life Database">HARLD</abbr>. The package workflow was revolutionary when new, but had begun to show stress under load. It was now my responsibility to  identify and ease bottlenecks in the process.</p>
          <p>I began by building strong relationships with the Area Office staff. Talking to and visiting them on a regular basis allowed me to know their pain points. At times, I would even sit down and help log a couple hundred packages to gain first-hand experience. Below, I detail a few optimizations I developed during my tenure.</p>
          <p>These optimizations pared down the time it took to log and distribute packages. Shaving off a few mere seconds here and there seems minor. Multiplied by up to 400 packages per day in peak season, those seconds could add up to hours of labor saved in a week. My optimizations helped the Area Offices cope with a 67% increase in packages over five years. To be fair, it also took several renovations to create space to handle the extra 34,000 packages per year.</p>
          <hr/>
          <h2>Highlights</h2>
          <ul>
            <li>
              <h3>Package Notification Emails</h3>
              <p>If you can focus on logging packages, it is easy to fall into an efficient rhythm. As I observed student staff, I noticed that most logged batches of packages then shelved them in bulk. This allowed them to pile packages by building or shelf and reduce the steps they had to take.</p>
              <p>This all fell apart if someone came in to pick up a package while packages were being logged. Front desk staff had to look at the arrival time to guess whether the package was already on the shelf. If not, the people logging packages had to stop to check their piles for the package.</p>
              <p><abbr title="Housing and Residence Life Database">HARLD</abbr> sent a notification email as soon as each package was logged. Before smartphones, it usually took people a while to see the email. Once that email started to &ldquo;ding&rdquo; in pockets, people started showing up almost immediately.</p>
              <p>Area Office staff requested a 15 minute delay before sending each email. Neither my supervisor nor I could come up with an elegant approach for this, so we took a step back. Was there a different way to solve the same problem? What if we sent all the notifications in bulk instead of queuing each individual message?</p>
              <p>The Area Office staff liked the idea and I got to work. I removed the code that sent the notification email during package logging. This left the notification time column null. Then I added a button that queried for packages with a null notification time and sent the emails. This also allowed <abbr title="Housing and Residence Life Database">HARLD</abbr> to send one email to a person who received many packages in the same batch.</p>
              <p>Clicking the new button came to be referred to as &ldquo;releasing the flood gates.&rdquo; The resulting wave of people got their packages faster since everything was sorted.</p>
            </li>
            <li>
              <h3>Presentation Mode Scanners</h3>
              <div class="hidden-xs col-sm-3 col-md-6 pull-right">
                <div class="row">
                  <figure class="col-sm-12 col-md-6">
                    <img src="/assets/images/LS4278.jpg" alt="" class="img-responsive" />
                    <figcaption>Before: <span class="hidden-sm">Motorola Symbol</span> LS4278 in Cradle Base<span class="hidden-sm"> Unit</figcaption>
                  </figure>
                  <figure class="col-sm-12 col-md-6">
                    <img src="/assets/images/DS6878.jpg" alt="" class="img-responsive" />
                    <figcaption>After: <span class="hidden-sm">Motorola Symbol</span> DS6878 in Hands-Free Base<span class="hidden-sm"> Unit</span></figcaption>
                  </figure>
                </div>
              </div>
              <p>Point of service hardware integration was always a key feature of <abbr title="Housing and Residence Life Database">HARLD</abbr>. Barcode scanners, in particular, allowed for quick, error-free data entry. Staff captured package tracking numbers in a flash using a barcode scanner. This saved time, but picking up and putting down the scanner slowed the process.</p>
              <p>We were using the Motorola Symbol LS4278 cordless handheld scanners at the time. The scanners had to be hand held to operate, which led to the constant up-down that was gumming up the works. </p>
              <p>When it was time to replace these scanners, I looked at a variety of alternatives. &ldquo;Presentation mode&rdquo; scanners would solve most of the issue; one could hold a package in front of the scanner and have it scanned. This would work great for small parcels, but the Area Offices often got <em>very</em> large packages. Presentation mode was <em>not</em> going to work for things like bicycles, furniture, and car tires.</p>
              <p>My growing frustration disappeared when I saw the &ldquo;<abbr title="Hands-Free">HF</abbr> base&rdquo; for the DS6878 scanner line. This obscure option ended up being the best of both worlds! The scanner form-factor was almost identical to the LS4278, so it would work for the big stuff. The magic was in the charging base, which held the scanner upright. This allowed the scanners to function in presentation mode while docked and charging.</p>
            </li>
            <li>
              <h3>Scan to Distribute</h3>
              <figure class="col-xs-6 col-md-5 pull-right">
                <img src="/assets/images/harld-package-label.jpg" alt="" class="img-responsive" />
                <figcaption><abbr title="Housing and Residence Life Database">HARLD</abbr> <span class="hidden-sm hidden-xs">Package</span> Tracking Label</figcaption>
              </figure>
              <p><abbr title="Housing and Residence Life Database">HARLD</abbr> assigned a package ID and printed an internal tracking label when a package was logged. Area Office staff used these labels when locating packages. For a long time, the last three digits of the package ID were enough to identify a package on the shelf. Staff picked up packages from the shelf, checked them off in <abbr title="Housing and Residence Life Database">HARLD</abbr>, and clicked &ldquo;Distribute.&rdquo;</p>
              <p>As package volume increased, collisions in the last 3 digits became more common. This led to mispicks and people sometimes getting the wrong package. The obvious solution was to have staff scan the barcode on the tracking label instead of checking it off.</p>
              <p>The physical logistics of this proved inefficient. Students often grabbed packages as soon as they hit the counter, so scanning had to occur behind the desk. Find packages, put on desk, lift scanner, scan, put down scanner, pick up packages, hand to recipient.</p>
              <p>Once we switched to presentation mode scanners, this process became fast and fluid. Find packages, present to scanner, hand to recipient.</p>
            </li>
          </ul>
