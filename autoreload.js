var bs = require('browser-sync').create();

bs.watch('*.php', function (event, file) {
  if (event === 'change' || event === 'add') {
    bs.reload();
  }
});

bs.init({
  proxy: 'http://fictional-university.local/',
  notify: false,
});
