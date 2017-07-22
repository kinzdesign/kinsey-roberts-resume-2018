require 'uglifier'
Dir.chdir("/")
require_relative '_write_file_with_feedback'

# concatenates 
def concat_javascript(webroot, file_name, git)
  puts " + Concatenating JavaScript: #{file_name}.jslist..."
  # compute input file path and base output file name (w/o extension) folders and file names
  js_dir = File.join("src", "js")
  input_path = File.join(js_dir, "#{file_name}.jslist")
  output_base = File.join("assets", "js", file_name)
  raw_js_path = "#{output_base}.js"

  # output will hold the raw, concatenated JavaScript
  raw_js = ''
  # open the jslist file
  File.open(File.join(webroot, input_path), "r") do |input|
    # iterate over lines of jslist
    input.each_line do |line|
      # trim line
      line.strip!
      # ignore comments
      unless line.length < 1 || line.start_with?('//') || line.start_with?('#')
        # expand path of included file
        include_path = File.join(webroot, js_dir, line)
        # check that included file exists
        if(File.exist?(include_path))
          # open included file and concat contents to raw_js
          File.open(include_path, "r") do |file|
            raw_js = "#{raw_js}\r\n#{file.read}"
          end
        else
          puts "!!!! Could not find #{include_path}"
        end
      end
    end
  end
  # write raw_js as .js
  write_file_with_feedback(webroot, raw_js_path, raw_js, git)
  # uglify raw_js
  uglified, source_map = Uglifier.new({
    :output => {
      :comments => :none
    }
  }).compile_with_map(raw_js)
  #write uglified and source_map
  write_file_with_feedback(webroot, "#{output_base}.min.js", uglified, git)
  write_file_with_feedback(webroot, "#{output_base}.min.js.map", source_map, git)
end
