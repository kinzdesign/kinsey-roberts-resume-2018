# writes file and puts a message for the user and stages the file in git
def write_file_with_feedback(webroot, out_path, contents, git)
  out_file = File.join(webroot, out_path)
  # write file and puts size and path
  bytes = File.write(out_file, contents)
  puts "   > Wrote #{sprintf '%6d', bytes} bytes to #{out_file}"
  git.add(out_path)
end