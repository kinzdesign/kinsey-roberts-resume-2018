          <div class="col-sm-6 col-md-4 pull-right">
            <div class="panel panel-info">
              <div class="panel-heading">
                <h3 class="panel-title">Deliverables</h3>
              </div>
              <div class="panel-body">
                <ul class="fa-ul">
                  <li>
                    <a href="" data-action="Body Click - Manuscript" target="_blank" data-category="Project - Gamifying Genetics">
                      <i class="fa fa-file-text-o" aria-hidden="true"></i>
                      Manuscript
                    </a>
                  </li>
                  <li>
                    <a href="https://docs.google.com/presentation/d/1VnUPDqUBFuRlauaON7OHGLlNKtsAHTYns2s28pLq_vs/edit#slide=id.p" data-action="Body Click - Slides" target="_blank" data-category="Project - Gamifying Genetics">
                      <i class="fa fa-file-powerpoint-o" aria-hidden="true"></i>
                      Defense Presentation
                    </a>
                  </li>

                  <li>
                    <a href="https://bitbucket.org/kinzdesign/helicase-mean/src" data-action="Body Click - Worker UX Repo" target="_blank" data-category="Project - Gamifying Genetics">
                      <i class="fa fa-bitbucket" aria-hidden="true"></i>
                      Worker-Facing UX Code
                    </a>
                  </li>
                  <li>
                    <a href="https://bitbucket.org/kinzdesign/helicase-admin-php/src" data-action="Body Click - Admin Repo" target="_blank" data-category="Project - Gamifying Genetics">
                      <i class="fa fa-bitbucket" aria-hidden="true"></i>
                      Administrative Tools Code
                    </a>
                  </li>
                  <li>
                    <a href="https://bitbucket.org/kinzdesign/helicase-data-php/src" data-action="Body Click - Data Repo" target="_blank" data-category="Project - Gamifying Genetics">
                      <i class="fa fa-bitbucket" aria-hidden="true"></i>
                      Data Analysis Tools Code
                    </a>
                  </li>
              </div>
            </div>
          </div>
          <p>In bioinformatics courses, we read papers about ideas and techniques with vast clinical implications. I often wondered how these discoveries could be translated to widespread usage in a population with low scientific literacy, generally, and especially low genetic literacy. How could a lay person give <em>truly</em> informed consent for some of these procedures without a decent understanding of genetics?</p>
          <p>This nagging question eventually encouraged me to take a step back and look at the situation from a broader perspective when deciding on a focus for my masters project. Any potential contributions I could make to the <em>theory</em> side of the problem would face the same <em>societal</em> hurdles.</p>
          <p>I decided to focus on the latter, looking for ways to improve genetic literacy. Taking inspiration from Luminosity, I decided to focus on gamification as a motivator, having people earn points as they progressed through self-paced online educational modules. My initial vision of a massive "map" of information to be discovered exceeded the scope of a masters project and providing rich social interactions would require gathering personal data that would have made IRB approval more difficult. I distilled the concept down to a small proof-of-concept that could be tested by anonymous workers on Amazon Mechanical Turk (AMT), my protocol was granted an exemption from full IRB review, and my advisor provided funding to have 100 AMT workers test it.</p>
          <p>The small sample size and lack of longitudinal follow-up make these results preliminary, at best, but workers performed better on a test of genetic knowledge after completing the exercise than they did before. Additionally, workers in the gamified cohort reported higher confidence in their answers to mini quizzes throughout the exercise, leading to higher point scores than the control cohort.</p>

          <h3>Highlights</h3>
          <ul>
            <li>Used project as a reason to learn AngularJS and Material Design</li>
            <li>Wrote a scheduled script to automatically pay AMT workers several times a day</li>
            <li>Built data analysis and visualization tools in PHP to simplify data interpretation and figure generation</li>
            <li>Developed a demographics questionnaire to better <a href="<?php echo Project::getBySlug('intersectional-identities')->url(); ?>" data-category="Project - Gamifying Genetics" data-action="Body Click - Intersectional Identities">capture intersectional identities</a> and allow greater self-determination and -expression</li>
          </ul>