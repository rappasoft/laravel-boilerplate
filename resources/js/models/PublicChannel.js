import Model from './Model'

export default class PublicChannel extends Model {
  resource()
  {
    return 'public/channels';
  }
}