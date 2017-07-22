Dir.chdir("/")
require_relative '_write_file_with_feedback'

# updates Config::$assetTimestamp to the current time
def update_timestamp(webroot)
  puts " + Updating asset timestamp..."
  # get current time
  timestamp = Time.now.to_i
  # load Config class file
  data = ''
  config_path = File.join(webroot, "classes", "Config.php")
  File.open(config_path, "r+") do |file|
    data = file.read
  end
  # update timestamp
  data.gsub!(/\$assetTimestamp(\s*)=(\s*)'([0-9]{10})'/) do |match|
    "\$assetTimestamp = '#{timestamp}'"
  end
  write_file_with_feedback(config_path, data)
end