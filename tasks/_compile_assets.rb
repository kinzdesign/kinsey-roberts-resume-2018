Dir.chdir("/")
require 'git'
require_relative '_compile_sass'
require_relative '_concat_javascript'
require_relative '_get_webroot'
require_relative '_update_timestamp'

def compile_assets()
  puts
  # compute webroot and sass-cache directory
  webroot = get_webroot()
  sass_cache_dir = File.join(webroot, ".sass-cache")

  # open Git repository
  git = Git.open(webroot)

  # compile sass
  compile_sass(webroot, "resume", sass_cache_dir, git)
  compile_sass(webroot, "resume-critical", sass_cache_dir, git)
  compile_sass(webroot, "pdf-viewer", sass_cache_dir, git)

  # compile javascript
  concat_javascript(webroot, "resume", git)
  concat_javascript(webroot, "inline", git)

  # update timestamp to expire caches
  update_timestamp(webroot, git)
  puts
end