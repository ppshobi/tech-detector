const wappalyzer = require('@wappalyzer/wappalyzer');

wappalyzer.run(process.argv.slice(2), function(stdout, stderr) {
  if ( stdout ) {
    process.stdout.write(stdout);
  }

  if ( stderr ) {
    process.stderr.write(stderr);
  }
});