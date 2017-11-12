Dir.chdir("/")
require_relative '_write_file_with_feedback'

# updates Config::getBuildTime() to the current time
def update_timestamp(webroot, git)
  puts " + Updating asset timestamp..."
  # get current time
  now = Time.now
  # load Config class file
  data = ''
  config_path = File.join("src", "classes", "Config.php")
  File.open(File.join(webroot, config_path), "r+") do |file|
    data = file.read
  end
  # update timestamp
  data.gsub!(/public\s*static\s*function\s*getBuildTime\(\)\s*\{\s*return\s*'([0-9]{10})'\s*;\s*\}/) do |match|
    "public static function getBuildTime() { return '#{now.to_i}'; }"
  end
  write_file_with_feedback(webroot, config_path, data, git)

  # load humans.txt
  humans_path = File.join("humans.txt")
  File.open(File.join(webroot, humans_path), "r+") do |file|
    data = file.read
  end
  # update timestamp
  data.gsub!(/Last\s*update:\s*[0-9]{4}\/[0-9]{2}\/[0-9]{2} [0-9]{2}:[0-9]{2}/) do |match|
    "Last update: #{now.strftime("%Y\/%m\/%d %H:%M")}"
  end
  write_file_with_feedback(webroot, humans_path, data, git)

end
