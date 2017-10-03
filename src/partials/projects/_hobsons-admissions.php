          <p>The Business Analyst on our team left the university in April 2017 and the position will remain vacant until late-October. This position primarily supported two products, one of which was a suite of admission management software from Hobsons.</p>
          <p>My supervisor asked that I take over support of Hobsons on an as-needed, as-possible basis until we filled the position, with admissions and marketing covering parts of the role as well. There was a modicum of knowledge transfer in the form of rough checklists, skeletal documentation and brief training in the last few weeks. I think we all knew it was insufficient preparation, but we did not expect our office to have to provide major support and I had a reputation for figuring things out on the fly and generally making [things] happen. Then, in one of the first admissions operations meetings I was covering, I was informed that the school was launching a new degree program to being accepting applications in August.</p>
          <p>I took a few deep breaths (during which I came to the sad realization that this was not some sort of stress-induced nightmare), and took some solace in fact that there was a spreadsheet on the screen of what needed to be done which was based on a checklist the analyst had left for us. As we went through the list to divide up labor, we found that we were unsure what man of the items meant and there were many items that no one seemed to know how to do. As the weeks went by, we continued to decipher what the various items meant and I dove head-first into the Hobsons products to figure out how to do things, reaching out to the vendor and another department using the same product for assistance and guidance. As the summer progressed, I would be asked to work out solutions to other issues that arose. I created documentation of processes and fleshed out checklists to step-by-step directions.</p>
          <p>The new program launched on schedule without any major issues. In addition, I worked a lot of magic throughout the summer, and even found ways to deliver solutions that were previously thought to be impossible.</p>
          <h2>Highlights</h2>
          <ul>
            <li>
              <strong>Implemented Live Chat Product</strong>
              <ul>
                <li>Hobsons white-labels a live chat product called LiveLeader and sells it to clients for communicating with prospective students</li>
                <li>Admissions purchased the product and wanted to go live with it in September</li>
                <li>I served as the key technological contact since the analyst position is still vacant</li>
                <li>The included chat window templates all clashed with our site, so I developed a new template</li>
                <li>I did not know which product they had white-labeled and had no documentation from Hobsons, which meant I had to reverse-engineer the existing templates</li>
              </ul>
            </li>
            <li>
              <strong>Integrated Live Chat with Admissions CRM</strong>
              <ul>
                <li>There is no integration between the live chat solution and the CRM, clients must export reports from LiveLeader and import them twice into the CRM to properly capture the chat contents</li>
                <li>According to the integration consultant, this is just how things are and there is nothing to be done about it</li>
                <li>Once I found out what the underlying product was, I noticed that LiveLeader has an API for getting the chat data</li>
                <li>Hobsons Connect CRM has an API for creating contacts and adding interactions to the communication log</li>
                <li>In under two days, I had a working script that pulls from the LiveLeader API, massages the data a bit, then pushes it into the Hobsons API</li>
              </ul>
            </li>
            <li>
              <strong>Communication Plan</strong>
              <ul>
                <li>Compiled a spreadsheet from contact filters and queuing rules to summarize who gets which emails and when in the funnel the messages are sent</li>
                <li>Integrated the Google Sheets API to pull data from the spreadsheet to build a tabular summary of the 159-email communication plan</li>
                <li>Developed a page to build email contents from partial files, add UTM information to all links, display a preview of the template with mail-merge fields highlighted, and provide the raw template HTML to be pasted into Hobsons</li>
              </ul>
            </li>
            <li>
              <strong>Decision Letters</strong>
              <ul>
                <li>Built a responsive email template so these 26 letters were more readable on mobile devices</li>
                <li>Updated conditional logic markup in emails to prevent open and close tags to be on opposite side of an <code>if</code> tag</li>
                <li>Created a page to build email contents from partials, display a preview of the template with mail-merge and conditional tags made visible, and provide the raw template HTML to be pasted into Hobsons</li>
              </ul>
            </li>
            <li>
              <strong>English Proficiency Test Score Data Flow</strong>
              <ul>
                <li>Added new business logic and fields to copy students&#39; test scores into the proper per-test fields for data analysis purposes and a test-agnostic field for PDF exports</li>
              </ul>
            </li>
          </ul>
