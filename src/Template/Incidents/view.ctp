<h1>Incident #<?php echo $incident["id"]; ?>
  <small>[Report <?php echo $this->Reports->linkToReportFromIncident($incident); ?>]</small>
</h1>
<table cellspacing="0" class="table table-bordered error-report">
  <tr>
    <td>Error Type</td>
    <td>
      <?php echo (($incident["exception_type"])?('php'):('js')); ?>
    </td>
  </tr>
  <tr>
    <td>Error Name</td>
    <td>
      <?php echo $incident["error_name"]; ?>
    </td>
  </tr>
  <tr>
    <td>Error Message</td>
    <td>
      <?php echo $incident["error_message"]; ?>
    </td>
  </tr>
  <tr>
    <td>Submission Date</td>
    <td>
      <?php echo $incident["created"]; ?>
    </td>
  </tr>
  <tr>
    <td>PMA Version</td>
    <td>
      <?php echo $incident["full_report"]["pma_version"]; ?>
    </td>
  </tr>
  <tr>
    <td>PHP Version</td>
    <td>
      <?php echo $incident["full_report"]["php_version"]; ?>
    </td>
  </tr>
  <tr>
    <td>Browser</td>
    <td>
      <?php echo $incident["full_report"]["browser_name"] . " " .
          $incident["full_report"]["browser_version"]; ?>
    </td>
  </tr>
  <tr>
    <td>Useragent</td>
    <td>
      <?php echo $incident["full_report"]["user_agent_string"]; ?>
    </td>
  </tr>
  <tr>
    <td>Server Software</td>
    <td>
      <?php echo $incident["full_report"]["server_software"]; ?>
    </td>
  </tr>
  <tr>
    <td>User OS</td>
    <td>
      <?php echo $incident["user_os"]; ?>
    </td>
  </tr>
  <tr>
    <td>Locale</td>
    <td>
      <?php echo $incident["full_report"]["locale"]; ?>
    </td>
  </tr>
  <tr>
    <td>Script name</td>
    <td>
      <?php echo $incident["script_name"]; ?>
    </td>
  </tr>
  <tr>
    <td>URI</td>
    <td>
      <?php
        if ($incident["exception_type"]) {
          echo 'NA';
        } else {
          echo $incident["full_report"]["exception"]["uri"];
        }
      ?>
    </td>
  </tr>
  <tr>
    <td>Configuration storage enabled</td>
    <td>
      <?php echo $incident["full_report"]["configuration_storage"]; ?>
    </td>
  </tr>
</table>

<h4>Description submited by user:</h4>
<pre>
<?php echo nl2br($incident["steps"]); ?>
</pre>

<h4>Stacktrace:</h4>
<?php echo $this->Incidents->getStacktrace($incident, "well"); ?>

<h4>Microhistory:</h4>
<pre>
<?php
  if (($incident["exception_type"])) {
    echo 'NA';
  } else {
    echo json_encode($incident["full_report"]["microhistory"], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
  }
?>
</pre>
