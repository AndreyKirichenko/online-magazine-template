const ELEMENT_ID = 'vk_groups';

export default function VKGroup() {
  if (!document.getElementById(ELEMENT_ID)) {
    return;
  }

  window.VK.Widgets.Group(
    ELEMENT_ID,
    {
      mode: 3,
      width: 'auto',
      color2: '111',
      color3: '333'
    },
    39455285
  );
}
