# writes file and puts a message for the user
def write_file_with_feedback(out_path, contents)
  bytes = File.write(out_path, contents)
  puts "\tWrote #{bytes} bytes to #{out_path}"
end