import {shallow} from '@vue/test-utils';
import Example from '../../resources/assets/js/frontend/components/ExampleComponent.vue';

describe('Example', () => {
    let wrapper;

    beforeEach(() => {
        wrapper = shallow(Example);
    });

    it('should say it is an example component', function () {
        expect(wrapper.html()).toContain("I'm an example Vue component!");
    });
});
