/**
 * @file
 * A Backbone View that provides the visual view of the edit mode toggle.
 */

(function (Drupal, Backbone) {

  "use strict";

  /**
   * Renders the visual view of the edit mode toggle. Listens to mouse & touch.
   *
   * Handles edit mode toggle interactions.
   */
  Drupal.contextualToolbar.VisualView = Backbone.View.extend({

    events: function () {
      // Prevents delay and simulated mouse events.
      var touchEndToClick = function (event) {
        event.preventDefault();
        event.target.click();
      };

      return {
        'click': function () {
          this.model.set('isViewing', !this.model.get('isViewing'));
        },
        'touchend': touchEndToClick
      };
    },

    /**
     * {@inheritdoc}
     */
    initialize: function () {
      this.listenTo(this.model, 'change', this.render);
      this.listenTo(this.model, 'change:isViewing', this.persist);
    },

    /**
     * {@inheritdoc}
     */
    render: function () {
      // Render the visibility.
      this.$el.toggleClass('hidden', !this.model.get('isVisible'));
      // Render the state.
      this.$el.find('button').toggleClass('active', !this.model.get('isViewing'));

      return this;
    },

    /**
     * Model change handler; persists the isViewing value to localStorage.
     *
     * isViewing === true is the default, so only stores in localStorage when
     * it's not the default value (i.e. false).
     *
     * @param Drupal.contextualToolbar.StateModel model
     *   A Drupal.contextualToolbar.StateModel model.
     * @param bool isViewing
     *   The value of the isViewing attribute in the model.
     */
    persist: function (model, isViewing) {
      if (!isViewing) {
        localStorage.setItem('Drupal.contextualToolbar.isViewing', 'false');
      }
      else {
        localStorage.removeItem('Drupal.contextualToolbar.isViewing');
      }
    }

  });

})(Drupal, Backbone);
