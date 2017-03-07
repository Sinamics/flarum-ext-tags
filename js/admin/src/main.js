import Tag from 'sinamics/tags/models/Tag';
import addTagsPermissionScope from 'sinamics/tags/addTagsPermissionScope';
import addTagPermission from 'sinamics/tags/addTagPermission';
import addTagsPane from 'sinamics/tags/addTagsPane';
import addTagsHomePageOption from 'sinamics/tags/addTagsHomePageOption';
import addTagChangePermission from 'sinamics/tags/addTagChangePermission';

app.initializers.add('sinamics-tags', app => {
  app.store.models.tags = Tag;
  addTagsPermissionScope();
  addTagPermission();
  addTagsPane();
  addTagsHomePageOption();
  addTagChangePermission();
});
