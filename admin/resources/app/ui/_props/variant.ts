import { computed } from 'vue';

export function getVariant(props: any, { DEFAULT = 'primary' }) {
    return computed(() => {
        if (props.variant) {
            return props.variant;
        }

        if (props.primary) {
            return 'primary';
        }
        if (props.secondary) {
            return 'secondary';
        }
        if (props.round) {
            return 'round';
        }
        if (props.blue) {
            return 'blue';
        }
        if (props.gray) {
            return 'gray';
        }
        if (props.green) {
            return 'green';
        }
        if (props.success) {
            return 'success';
        }
        if (props.yellow) {
            return 'yellow';
        }
        if (props.warning) {
            return 'warning';
        }
        if (props.red) {
            return 'red';
        }
        if (props.danger) {
            return 'danger';
        }
        if (props.purple) {
            return 'purple';
        }
        if (props.orange) {
            return 'orange';
        }
        if (props.darkorange) {
            return 'darkorange';
        }
        if (props.lightorange) {
            return 'lightorange';
        }
        if (props.grasgreen) {
            return 'grasgreen';
        }
        if (props.turkise) {
            return 'turkise';
        }
        if (props.lightblue) {
            return 'lightblue';
        }
        if (props.pink) {
            return 'pink';
        }
        if (props.white) {
            return 'white';
        }
        if (props.black) {
            return 'black';
        }

        return DEFAULT;
    });
}

export const variants = {
    variant: {
        type: String,
        default: null,
    },
    blue: {
        type: Boolean,
        default: false,
    },
    primary: {
        type: Boolean,
        default: false,
    },
    secondary: {
        type: Boolean,
        default: false,
    },
    gray: {
        type: Boolean,
        default: false,
    },
    green: {
        type: Boolean,
        default: false,
    },
    success: {
        type: Boolean,
        default: false,
    },
    yellow: {
        type: Boolean,
        default: false,
    },
    warning: {
        type: Boolean,
        default: false,
    },
    red: {
        type: Boolean,
        default: false,
    },
    danger: {
        type: Boolean,
        default: false,
    },
    orange: {
        type: Boolean,
        default: false,
    },
    purple: {
        type: Boolean,
        default: false,
    },
    darkorange: {
        type: Boolean,
        default: false,
    },
    lightorange: {
        type: Boolean,
        default: false,
    },
    grasgreen: {
        type: Boolean,
        default: false,
    },
    turkise: {
        type: Boolean,
        default: false,
    },
    lightblue: {
        type: Boolean,
        default: false,
    },
    pink: {
        type: Boolean,
        default: false,
    },
    white: {
        type: Boolean,
        default: false,
    },
    black: {
        type: Boolean,
        default: false,
    },
};
