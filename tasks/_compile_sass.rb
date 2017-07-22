require 'sass'
Dir.chdir("/")
require_relative '_write_file_with_feedback'

# compiles compressed and nested versions of css with source maps
def compile_sass(webroot, file_name, sass_cache_dir, git)
  puts " + Compiling Sass: #{file_name}.scss..."
  # compute input file path and base output file name (w/o extension) folders and file names
  sass_file = File.join("src", "sass", "#{file_name}.scss")
  output_base = File.join("assets", "css", file_name)
  # write minified and nested css
  compile_sass_with_map(webroot, file_name, sass_file, "#{output_base}.min.css", :compressed, sass_cache_dir, git)
  compile_sass_with_map(webroot, file_name, sass_file, "#{output_base}.css", :nested, sass_cache_dir, git)
end

# compiles sass and writes css and source map
def compile_sass_with_map(webroot, file_name, sass_file, out_path, style, sass_cache_dir, git)
  # compute map file path
  map_path = "#{out_path}.map"
puts "map_path /#{map_path}"
  # build Sass Engine with correct options
  sass_engine = Sass::Engine.for_file(File.join(webroot, sass_file), {
    :style => style,
    :cache_location => sass_cache_dir,
    :file_name => "/#{out_path}"
  })
  # render css
  output = sass_engine.render_with_sourcemap("/#{map_path}")
  # write rendered css
  write_file_with_feedback(webroot, out_path, output[0], git)
  # write sourcemap
  write_file_with_feedback(webroot, map_path, output[1].to_json({
    :css_path => out_path,
    :sourcemap_path => "/#{map_path}"
  # fix paths
  }).gsub!('../../wamp64/www/', '/assets/'), git)
end