Dir.chdir("/")
require_relative '_compile_sass'

def compile_assets()
  # compute webroot and sass-cache directory
  webroot = File.expand_path(File.join(File.dirname(File.expand_path(__FILE__)),".."))
  sass_cache_dir = File.join(webroot, ".sass-cache")

  # Compile Sass
  compile_sass("resume", webroot, sass_cache_dir)
end