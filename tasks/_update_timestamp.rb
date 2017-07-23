Dir.chdir("/")
require_relative '_write_file_with_feedback'

# updates Config::getBuildTime() to the current time
def update_timestamp(webroot, git)
  puts " + Updating asset timestamp..."
  # get current time
  timestamp = Time.now.to_i
  # load Config class file
  data = ''
  config_path = File.join("src", "classes", "Config.php")
  File.open(File.join(webroot, config_path), "r+") do |file|
    data = file.read
  end
  # update timestamp
  data.gsub!(/public\s*static\s*function\s*buildTime\(\)\s*\{\s*return\s*'([0-9]{10})'\s*;\s*\}/) do |match|
    "public static function buildTime() { return '#{timestamp}'; }"
  end
  write_file_with_feedback(webroot, config_path, data, git)
end