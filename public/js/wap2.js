const wappalyzer = require('wappalyzer');

wappalyzer.run([process.argv.slice(2), '--resource-timeout=10000'], function(stdout, stderr) {
  if ( stdout ) {
    process.stdout.write(stdout);
  }

  if ( stderr ) {
    process.stderr.write(stderr);
  }
});