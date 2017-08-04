          <p>Increases in both online shopping (especially Amazon Prime) and the geographical market of Case Western Reserve University (among west coast and international students) were leading to increasing mailroom traffic for the Office of Housing and Residence Life's two Area Offices.</p>
          <p>As the primary maintainer of the software used to log and manage packages - <a href="harld/">Housing And Residence Life Database (HARLD)</a> - I was tasked with identifying and alleviating bottlenecks in the package logging workflow.</p>
          <p>I worked closely with the staff who logged packages to find opportunities for improvement and designed new optimizations and features.</p>
          <p>Through software, hardware, and process improvements, I was able to help the mailrooms cope with a 67% increase in mailroom traffic, from 51k packages in Fiscal Year 2008 to 85k packages in Fiscal Year 2013, without major staffing increases.</p>
          <hr/>
          <h3>Highlights</h3>
          <p>To give an idea of the scope of the issues created by such an increase, there were at least 3 physical remodels to expand the area offices in order to add additional shelves for packages. At peak times, the offices could handle over 400 packages per day, so a mere 9 second decrease in the time to log a package could save an hour of labor a day.</p>
          <p>I visited the area offices frequently, talking to staff about pain points, observing packages being logged, and occasionally sat down and logged a hundred or so packages. These experiences taught me the importance of keeping your end users front-of-mind throughout the development process.
          </p>
          <ul>
            <li>
              <h4>Package Arrival Email Timing</h4>
              <p>Most packages were logged by front desk staff who would have to stop logging packages when a customer arrived. As smartphones became more prevalent, students increasingly showed up to retrieve their packages within minutes of the package being logged, sometimes before the package could even be shelved. The frequent task switching combined with inefficient searches through unsorted packages were slowing the operations of the Area Offices.</p>
              <p>I refactored the data layer code to not send emails when the package was initially logged, leaving the notification stamp column null. Then I added a button to the desktop HARLD client that, when pressed, queried for all packages in that office without a notification stamp, sent the package arrival email, and set the notification stamp.</p>
              <p>Colloquially, pressing the button came to be known as "releasing the flood gates," but the wave of students got their packages faster since they were sorted and ready.</p>
            </li>
            <li>
              <div class="col-sm-3 col-md-6 pull-right">
                <div class="row">
                  <div class="col-sm-12 col-md-6">
                    <img src="/assets/images/LS4278.jpg" alt="Handheld cordless barcode scanner (Motorola Symbol LS4278) docked in cradle base unit. The scanner rest parallel to the table and must be picked up and moved to the package." class="img-responsive pull-right" />
                    Before: Motorola Symbol LS4278 in Cradle Base Unit
                  </div>
                  <div class="col-sm-12 col-md-6">
                    <img src="/assets/images/DS6878.jpg" alt="Handheld cordless barcode scanner (Motorola Symbol DS6878) docked in hands free base unit. The scanner stands nearly upright so a package can be held in front of the scanner." class="img-responsive pull-right" />
                    After: Motorola Symbol DS6878 in Hands-Free Base Unit
                  </div>
                </div>
              </div>
              <h4>Presentation Mode Scanners</h4>
              <p>Point of service hardware integration was always a key feature of HARLD. Previous developers had used barcode scanners for quick, error-free data entry in several workflows, including package logging. Package carrier tracking numbers were captured by the scanners in a flash, but constantly picking up and putting down the scanner slowed the process.</p>
              <p>When it came time to replace our fleet of Motorola Symbol LS4278 cordless handheld barcode scanners - which had a cradle style base unit and had to be picked up to be used - I surveyed Motorola Symbol's product line. Corded presentation-type scanners (either free-standing squares or gooseneck-mounted handhelds) would have worked for most packages, but the mailrooms often received <em>very</em> large packages (furniture, bicycles, tires) that necessitated the cordless hand-held form factor.</p>
              <p>Eventually, I found the DS6878 with the "HF base," an obscure option that ended up being the best of both worlds. The scanners were almost identical to the LS4278, but instead of a cradle, these had a base unit that held them upright. When in the base, the scanners would enter presentation mode and automatically scan any barcode put in front of them. </p>
              <p>This allowed small packages and letters to be scanned without having to pick up the scanner, while still being able to pick up the scanner and take it to the larger packages.</p>
            </li>
            <li>
              <h4>Scan to Distribute</h4>
              <p>When packages were logged, an internal tracking label was printed and affixed to the package. It had the full package ID (a 6-7 digit number) printed in small numbers, the last 3 digits printed in large numbers for easy identification on a shelf, and a barcode with "PK" and the package number (two-letter prefixes were used to distinguish object types, with PK being package).</p>
              <p>Historically, package traffic had been low enough that collisions in the last 3 digits were fairly rare and staff simply checked off packages on the screen as they distributed them rather than scanning the package ID label. As package volume increased, the last 3 digits became less reliable as a differentiator and mispicks began to become an issue.</p>
              <p>The obvious solution was to require that the packages be scanned upon distribution, but the physical workflow using handheld scanners was inefficient. Students would grab packages as soon as they hit the counter (leading to awkward exchanges such as "um, can you please give me back that box you just ripped open so I can scan it?"), so staff would walk to the shelves, grab the packages, pile them on the desk, pick the scanner up, scan them, put the scanner down, pick the packages up, and put them on the counter.</p>
              <p>With the new presentation mode scanners, the process became virtually seamless and ensured people got the right packages without grinding the front desk to a halt.</p>
            </li>
          </ul>
