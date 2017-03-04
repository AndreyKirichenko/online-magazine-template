const CLASS_NAME = 'vk_groups';

export default function VKGroup() {
  window.VK.Widgets.Group(
    CLASS_NAME,
    {
      mode: 3,
      width: 'auto',
      color2: '111',
      color3: '333'
    },
    39455285
  );

}
