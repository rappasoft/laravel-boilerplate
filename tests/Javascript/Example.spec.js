import { shallowMount } from '@vue/test-utils';
import Example from '@/frontend/components/ExampleComponent.vue';

describe('Example', () => {
    let wrapper;

    beforeEach(() => {
        wrapper = shallowMount(Example);
    });

    it('should say it is an example component', () => {
        expect(wrapper.html()).toContain("I'm an example Vue component!");
    });
});
