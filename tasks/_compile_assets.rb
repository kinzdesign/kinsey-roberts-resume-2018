Dir.chdir("/")
require_relative '_compile_sass'
require_relative '_concat_javascript'
require_relative '_get_webroot'
require_relative '_update_timestamp'

def compile_assets()
  puts
  puts "Compiling assets..."
  # compute webroot and sass-cache directory
  webroot = get_webroot()
  sass_cache_dir = File.join(webroot, ".sass-cache")

  # compile sass
  compile_sass("resume", webroot, sass_cache_dir)
  compile_sass("resume-critical", webroot, sass_cache_dir)

  # compile javascript
  concat_javascript("resume", webroot)

  # update timestamp to expire caches
  update_timestamp(webroot)
end