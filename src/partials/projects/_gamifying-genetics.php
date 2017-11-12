          <div class="col-sm-6 col-md-4 pull-right">
            <div class="panel panel-info">
              <div class="panel-heading">
                <h2 class="panel-title">Artifacts</h2>
              </div>
              <div class="panel-body">
                <ul class="list-sm-padding list-margin-bottom">
                  <li>
                    <a href="https://docs.google.com/document/d/1WloroBWWK51Tm-KnqPvE_WdEoqdb7rtCIE-dtGlva1E/edit?usp=sharing" data-action="Body Click - Manuscript" target="_blank" rel="noopener" data-category="Project - Gamifying Genetics">
                      Manuscript
                    </a>
                  </li>
                  <li>
                    <a href="https://docs.google.com/presentation/d/1VnUPDqUBFuRlauaON7OHGLlNKtsAHTYns2s28pLq_vs/edit?usp=sharing" data-action="Body Click - Slides" target="_blank" rel="noopener" data-category="Project - Gamifying Genetics">
                      Defense Presentation
                    </a>
                  </li>
                  <li>
                    <a href="https://kr-research-data.herokuapp.com/" data-action="Body Click - Data Site" target="_blank" rel="noopener" data-category="Project - Gamifying Genetics">
                      Data Analysis Tools (Live)
                    </a>
                  </li>
                  <li>
                    <a href="https://bitbucket.org/kinzdesign/helicase-mean/src" data-action="Body Click - Worker UX Repo" target="_blank" rel="noopener" data-category="Project - Gamifying Genetics">
                      Worker-Facing UX Code
                    </a>
                  </li>
                  <li>
                    <a href="https://bitbucket.org/kinzdesign/helicase-admin-php/src" data-action="Body Click - Admin Repo" target="_blank" rel="noopener" data-category="Project - Gamifying Genetics">
                      Administrative Tools Code
                    </a>
                  </li>
                  <li>
                    <a href="https://bitbucket.org/kinzdesign/helicase-data-php/src" data-action="Body Click - Data Repo" target="_blank" rel="noopener" data-category="Project - Gamifying Genetics">
                      Data Analysis Tools Code
                    </a>
                  </li>
                  <li>
                    <a href="https://helicase.herokuapp.com/" data-action="Body Click - Alpha Project" target="_blank" rel="noopener" data-category="Project - Gamifying Genetics">
                      Precursor Project on Gene Network Visualization
                    </a>
                  </li>
              </div>
            </div>
          </div>
          <p>The papers we read in Bioinformatics classes fascinated me. The ways researchers reverse-engineered generics often blew my mind. With many of these discoveries, I wondered how they could be translated for clinical use. Few people have the scientific literacy to give informed consent to such procedures.</p>
          <p>As I was deciding what project I should pursue for my masters program, this concern kept popping up. In time, I decided to face the lack of scientific literacy head-on.</p>
          <p>Taking inspiration from Luminosity, I decided to focus on gamification as a motivator. People would earn points as they progressed through self-paced online educational modules. I envisioned a massive "map" of information for users to explore. In this vision, rich social interactions would keep users engaged and returning.</p>
          <p>Starting from this hypothetical end product, I worked backwards to a proof of concept. I needed something small enough that the experience was reproducible across participants. I chose to scrap the social aspects from the proof of concept as they would complicate <abbr title="Institutional Review Board">IRB</abbr> approval. My adviser suggested Amazon Mechanical Turk (AMT) for participant recruitment. I proposed a budget to have 100 participants test the proof of concept and my adviser funded it. I wrote a protocol that the <abbr title="Institutional Review Board">IRB</abbr> exempted from full review and built the website for my study.</p>
          <p>During data collection, I developed a <abbr title="script that automatically runs at scheduled times">cron job</abbr> that automatically paid participants. As I began to look at the data, I started writing <abbr title="Structured Query Language">SQL</abbr> and <abbr title="Hypertext Preprocessor">PHP</abbr> to format data for analysis in other programs. As this became tedious, I started moving the analysis into <abbr title="Hypertext Preprocessor">PHP</abbr>. Soon, I could run <em>t</em>-tests on any query I composed. Then I added visualizations using Google Charts. Unable to find a <abbr title="Hypertext Preprocessor">PHP</abbr> implementation of <abbr title="Analysis of Variation">ANOVA</abbr> for unequal sample sizes, I wrote one. Implementing multivariate regressions was beyond my skill, so I wrote <abbr title="Hypertext Preprocessor">PHP</abbr> scripts to farm it out to R in real-time.</p>
          <p>Despite the small sample size, some patterns emerged. On average, scores on a test of genetic knowledge increased after participation. Participants in the gamified cohort reported higher confidence in their answers to questions. This added confidence led to higher scores among the gamified cohort.</p>