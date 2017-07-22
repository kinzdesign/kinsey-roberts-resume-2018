Dir.chdir("/")
require_relative '_compile_sass'
require_relative '_get_webroot'

def compile_assets()
  # compute webroot and sass-cache directory
  webroot = get_webroot()
  sass_cache_dir = File.join(webroot, ".sass-cache")

  # Compile Sass
  compile_sass("resume", webroot, sass_cache_dir)
  compile_sass("resume-critical", webroot, sass_cache_dir)
end