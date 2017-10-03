          <p>Shortly before I started at this position, the business school's web server had been breached. We were running Adobe ColdFusion, which is insecure by default and my predecessor had never been able to harden the server according to the 35 page "Lockdown Guide" from Adobe (plus we were running two major versions behind).</p>
          <p>I was tasked with investigating what happened and preventing it from happening again. This required learning about the inner workings of Adobe ColdFusion - a language that I was completely new to - and exploring the code base I had inherited.</p>
          <p>Intruders had been able to upload malicious code via an improperly sanitized file upload form where someone forgot to validate the file extension before writing to the file system. According to my research, this was a common attack vector against ColdFusion servers, so I checked all of our file upload forms to ensure that all were following security best practices. Our susceptibility to such a common attack did not bode well for the overall security of our code, so once the file uploads we locked down, I outlined a three-phase plan to reduce our risk: fix high-risk vulnerabilities, upgrade ColdFusion, and eventually transition to another language.</p>
          <p>The first two phases are completed and the third is well underway. Aside from some hiccups around the go-live of phase two, the process has gone smoothly. I have developed procedures, documentation, and tools to assist throughout the process and provided education and training to fellow staff.</p>

          <h2>Phases</h2>
          <ol>
            <li>
              <strong>Find and mitigate vulnerabilities in existing code</strong>
              <ul>
                <li>Researched common ColdFusion vulnerabilities</li>
                <li>Built a list of potentially risky tokens to search for in our code</li>
                <li>Wrote a tool that logged all instances of these tokens to a database</li>
                <li>Developed a GUI to view instances and record their statuses (unexamined, false positive, mitigated, etc.)</li>
                <li>Deprecated a ColdFusion blog platform that saw minimal use</li>
              </ul>
            </li>
            <li>
              <strong>Upgrade ColdFusion from 9 to 11</strong>
              <ul>
                <li>Worked with sysadmin to spin up a new VM as a staging server</li>
                <li>Installed the latest version of ColdFusion and all available updates</li>
                <li>
                  Completed the 77-page "Lockdown Guide" based on the principle of least privilege
                  <ul>
                    <li>Created non-default users for IIS and ColdFusion (CF11 is served using Tomcat via ISAPI)</li>
                    <li>Configured file system security permissions</li>
                    <li>Whitelisted file extensions and MIME types</li>
                    <li>Generated per-site (and occasionally per-subfolder) "Security Sandboxes" to limit features and paths accessible by ColdFusion</li>
                    <li>Analyzed code to grant only those features actually used by each site</li>
                  </ul>
                </li>
                <li>Upgraded XLSTs to version 2.0 and ported charts to a new reporting engine</li>
                <li>Helped test pages across all sites and devised remedies for issues that arose</li>
                <li>Resolved additional configuration issues after go-live with the help of a consultant</li>
              </ul>
            </li>
            <li>
              <strong><a href="<?php echo Project::getBySlug('server-migration')->url(); ?>" data-category="Project - Server Hardening" data-action="Body Click - Server Migration">Transition away from ColdFusion</a></strong>
            </li>
          </ol>
