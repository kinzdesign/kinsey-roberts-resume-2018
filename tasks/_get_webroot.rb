def get_webroot()
  File.expand_path(File.join(File.dirname(File.expand_path(__FILE__)),".."))
end