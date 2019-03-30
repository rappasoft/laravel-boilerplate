import { mount } from '@vue/test-utils';
import Example from '../../resources/js/frontend/components/ExampleComponent.vue';

describe('Example', () => {
    it('should say it is an example component', function () {
        const wrapper = mount(Example);

        expect(wrapper.html()).toContain("I'm an example Vue component!");
    });
});
