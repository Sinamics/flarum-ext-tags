import Model from 'flarum/Model';
import Discussion from 'flarum/models/Discussion';
import IndexPage from 'flarum/components/IndexPage';

import Tag from 'sinamics/tags/models/Tag';
import TagsPage from 'sinamics/tags/components/TagsPage';
import DiscussionTaggedPost from 'sinamics/tags/components/DiscussionTaggedPost';

import addTagList from 'sinamics/tags/addTagList';
import addTagFilter from 'sinamics/tags/addTagFilter';
import addTagLabels from 'sinamics/tags/addTagLabels';
import addTagControl from 'sinamics/tags/addTagControl';
import addTagComposer from 'sinamics/tags/addTagComposer';

app.initializers.add('sinamics-flarum-tags', function(app) {
  app.routes.tags = {path: '/tags', component: TagsPage.component()};
  app.routes.tag = {path: '/t/:tags', component: IndexPage.component()};

  app.route.tag = tag => app.route('tag', {tags: tag.slug()});

  app.postComponents.discussionTagged = DiscussionTaggedPost;

  app.store.models.tags = Tag;

  Discussion.prototype.tags = Model.hasMany('tags');
  Discussion.prototype.canTag = Model.attribute('canTag');

  addTagList();
  addTagFilter();
  addTagLabels();
  addTagControl();
  addTagComposer();
});
