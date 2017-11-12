<?php
  Page::registerGoogleCharts();
  Page::registerChart('harldByYear');
  function emitProjectListItem($slug) {
    $project = Project::getBySlug($slug);
    echo "            <li>\r\n              <a href=\"{$project->url()}\" data-category=\"Project - HARLD\" data-action=\"Body Click - {$project->name()}\"><h3>{$project->name()}</h3></a>\r\n              <p>{$project->synopsis()}</p>\r\n            </li>\r\n";
  }
?>
          <p><abbr title="Housing and Residence Life Database">HARLD</abbr> powers the day-to-day operations of several student-serving departments. It is a custom multi-client, multi-platform system built on C# and the .NET Framework.</p>
          <p>My supervisor originated <abbr title="Housing and Residence Life Database">HARLD</abbr> and remained active as the architect and database developer. Everything else fell to me as the  only full-time developer in the office. I maintained, upgraded, and optimized existing features and added new functionality.</p>
          <p>My work touched every level of the stack: data access code, business logic, point of service hardware integrations, desktop <abbr title="Graphical User Interface">GUI</abbr> clients, web portals, mobile apps, and more. I also provided the majority of support for the product's many end-users. Strong relationships with users helped me learn their needs, priorities, and pain points. This information allowed me to deliver proactive solutions to emerging issues. Bug fixes kept me on my toes; sometimes I delivered multiple releases in a day during peak times of the year.</p>
          <p><abbr title="Housing and Residence Life Database">HARLD</abbr> let offices offer expanding services in tight budgetary times. Optimizing workflows and automating tasks allowed staff to focus on serving students. The chart below shows the growth of <abbr title="Housing and Residence Life Database">HARLD</abbr> during my tenure. The massive uptick in package volume (in blue) shows the sort of growth we were seeing in existing modules. New modules including access badges (green) and physical keys (purple) expanded <abbr title="Housing and Residence Life Database">HARLD</abbr>'s scope.</p>
          <hr/>
          <div class="row padding-both-large">
            <div id="chart_harldByYear" class="col-lg-6" style="height: 400px;"></div>
            <div id="table_harldByYear" class="col-lg-6" style="height: 400px;"></div>
          </div>
          <hr/>
          <h2>Related Projects</h2>
          <p>There were plenty of challenging and rewarding experiences while working on <abbr title="Housing and Residence Life Database">HARLD</abbr>. Here are a few that stick out:</p>
          <ul>
<?php
  emitProjectListItem('mailroom');
  emitProjectListItem('physical-security');
?>
          </ul>
