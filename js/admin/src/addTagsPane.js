import { extend } from 'flarum/extend';
import AdminNav from 'flarum/components/AdminNav';
import AdminLinkButton from 'flarum/components/AdminLinkButton';

import TagsPage from 'sinamics/tags/components/TagsPage';

export default function() {
  app.routes.tags = {path: '/tags', component: TagsPage.component()};

  app.extensionSettings['sinamics-tags'] = () => m.route(app.route('tags'));

  extend(AdminNav.prototype, 'items', items => {
    items.add('tags', AdminLinkButton.component({
      href: app.route('tags'),
      icon: 'tags',
      children: app.translator.trans('sinamics-tags.admin.nav.tags_button'),
      description: app.translator.trans('sinamics-tags.admin.nav.tags_text')
    }));
  });
}
