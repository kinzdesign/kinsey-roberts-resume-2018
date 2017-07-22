require 'sass'
Dir.chdir("/")
require_relative '_write_file_with_feedback'

# compiles compressed and nested versions of css with source maps
def compile_sass(file_name, webroot, sass_cache_dir)
  # compute input file path and base output file name (w/o extension) folders and file names
  sass_file = File.join(webroot, "src", "sass", "#{file_name}.scss")
  output_base = File.join(webroot, "assets", "css", file_name)
  # write minified and nested css
  compile_sass_with_map(file_name, sass_file, "#{output_base}.min.css", :compressed, sass_cache_dir)
  compile_sass_with_map(file_name, sass_file, "#{output_base}.css", :nested, sass_cache_dir)
end

# compiles sass and writes css and source map
def compile_sass_with_map(file_name, sass_file, out_path, style, sass_cache_dir)
  # compute map file path
  map_path = "#{out_path}.map"
  # build Sass Engine with correct options
  sass_engine = Sass::Engine.for_file(sass_file, {
    :style => style,
    :cache_location => sass_cache_dir,
    :file_name => out_path
  })
  # render css
  output = sass_engine.render_with_sourcemap("/assets/css/#{file_name}.min.css.map")
  # write rendered css
  write_file_with_feedback(out_path, output[0])
  # write sourcemap
  write_file_with_feedback(map_path, output[1].to_json({
    :css_path => out_path,
    :sourcemap_path => map_path
  # fix paths
  }).gsub!('../../', '/assets/'))
end