          <p>Someone breached the business school's web server before I started this position. The server ran Adobe ColdFusion, which is not known as being secure out of the box. My predecessor had failed to harden the server according to Adobe's "Lockdown Guide."  Plus we were running two major versions behind the current version.</p>
          <p>I needed to investigate what happened and prevent it from happening again. New to ColdFusion, I had to rapidly learn its inner workings.</p>
          <p>The exploit used was a common ColdFusion attack on file uploads. Someone forgot to check file extensions on uploads before saving them. I inspected all the file uploads on the server and patched the holes as needed.</p>
          <p>Falling victim to such a common attack did not bode well for the code base I'd inherited. Once I fixed all the file uploads, I drafted a three-phase to reduce our risk:</p>
          <ol class="list-margin-bottom">
            <li>
              <h2 class="h5">Found and mitigated vulnerabilities in existing code</h2>
              <ul>
                <li>Researched common ColdFusion vulnerabilities</li>
                <li>Built a list of  risky tokens to search for in our code</li>
                <li>Wrote a tool that logged all instances of these tokens to a database</li>
                <li>Developed a <abbr title="Graphical User Interface">GUI</abbr> to view instances and record remediation statuses</li>
                <li>Deprecated a ColdFusion blog platform that saw minimal use</li>
              </ul>
            </li>
            <li>
              <h2 class="h5">Upgraded ColdFusion from 9 to 11</h2>
              <ul>
                <li>Worked with <abbr title="Systems Administrator">sysadmin</abbr> to spin up a new <abbr title="Virtual Machine">VM</abbr> as a staging server</li>
                <li>Installed the latest version of ColdFusion and all available updates</li>
                <li>
                  Completed the 77-page "Lockdown Guide" based on the principle of least privilege
                  <ul>
                    <li>Created non-default users for <abbr title="Microsoft Internet Information Services">IIS</abbr> and ColdFusion</li>
                    <li>Configured file system security permissions</li>
                    <li>White listed file extensions and <abbr title="Multipurpose Internet Mail Extensions">MIME</abbr> types</li>
                    <li>Generated per-site/directory "Security Sandboxes" to limit features and paths accessible by ColdFusion</li>
                    <li>Analyzed code to grant only those features actually used in each sandbox</li>
                  </ul>
                </li>
                <li>Upgraded XLSTs to version 2.0 and ported charts to a new reporting engine</li>
                <li>Helped test pages across all sites and devised remedies for issues that arose</li>
                <li>Resolved configuration issues after go-live with the help of a consultant</li>
              </ul>
            </li>
            <li>
              <h2 class="h5"><a href="<?php echo Project::getBySlug('server-migration')->url(); ?>" data-category="Project - Server Hardening" data-action="Body Click - Server Migration">Transitioning away from ColdFusion</a></h2>
              <ul>
                <li>We are in the process of moving to Microsoft ASP.NET</li>
            </li>
          </ol>
          <p>Throughout the process, the goal has been to keep the transitions invisible to end users. Despite some brief hiccups, things have been largely seamless. My procedures, documentation, and tools have made the process easier.</p>
